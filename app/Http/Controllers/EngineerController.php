<?php

namespace App\Http\Controllers;

use App\Models\AmeLicense;
use App\Models\AuthorizeLaca;
use App\Models\BasicLicense;
use App\Models\LionAirAirCraftType;
use App\Models\MandatoryTraining;
use App\Models\OtrApplication;
use App\Models\Personnel;
use App\Models\RatingTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = OtrApplication::with(['personnel', 'assessment'])->where('user_id', Auth::user()->id)->latest()->get();


        return view('engineer.dashboard', [
            'histories' => $histories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('engineer.submission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate biodata
        $biodata =  $request->validate([
            'name'        => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required|before:today',
            'photo'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone'       => 'required',
            'address'     => 'required',
            'company_no_id' => 'required',
            'last_formal_education' => 'required',
        ]);

        // validate type of rating training
        $typeOfRatingTrainingValidated = $request->validate([
            'type_of_rating_training' => 'required|array|min:1',
            'type_of_rating_training.*.course' => 'required|string|max:255',
            'type_of_rating_training.*.year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
        ], [
            'type_of_rating_training.required' => 'At least one training record is required.',
            'type_of_rating_training.*.course.required' => 'Course name is required for each training.',
            'type_of_rating_training.*.course.string' => 'Course name must be a valid string.',
            'type_of_rating_training.*.course.max' => 'Course name cannot exceed 255 characters.',
            'type_of_rating_training.*.year.required' => 'Year is required for each training.',
            'type_of_rating_training.*.year.integer' => 'Year must be a valid number.',
            'type_of_rating_training.*.year.digits' => 'Year must be a 4-digit number.',
            'type_of_rating_training.*.year.min' => 'Year cannot be earlier than 1900.',
            'type_of_rating_training.*.year.max' => 'Year cannot be in the future.',
        ]);

        // validate basic license
        $basicLicenseValidated = $request->validate([
            'basic_license' => 'required|array|min:1', // Validasi bahwa field ini adalah array dan minimal ada 1 item
            'basic_license.*.category' => 'required|string|max:255', // Validasi untuk setiap "category"
            'basic_license.*.card_no' => 'required|string|max:255', // Validasi untuk setiap "card_no"
        ], [
            'basic_license.required' => 'At least one basic license record is required.',
            'basic_license.*.category.required' => 'Category is required for each basic license.',
            'basic_license.*.category.string' => 'Category must be a valid string.',
            'basic_license.*.category.max' => 'Category cannot exceed 255 characters.',
            'basic_license.*.card_no.required' => 'Card No. is required for each basic license.',
            'basic_license.*.card_no.string' => 'Card No. must be a valid string.',
            'basic_license.*.card_no.max' => 'Card No. cannot exceed 255 characters.',
        ]);

        // validate AME License
        $ameLicenseValidated = $request->validate([
            'license_no' => 'required',
            'vut' => 'required',
        ]);

        // validate lion air aircraft type
        $lionAirAircraftTypeValidated = $request->validate([
            'lion_air_aircraft_type' => 'required|array|min:1', // Validasi array dan minimal 1 item
            'lion_air_aircraft_type.*.air_craft_type' => 'required|string|max:255', // Validasi setiap field "type" dalam array
        ], [
            'lion_air_aircraft_type.required' => 'At least one aircraft type is required.',
            'lion_air_aircraft_type.*.type.required' => 'Type is required for each aircraft.',
            'lion_air_aircraft_type.*.type.string' => 'Type must be a valid string.',
            'lion_air_aircraft_type.*.type.max' => 'Type cannot exceed 255 characters.',
        ]);

        DB::beginTransaction();
        try {
            // save photo
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();

                // Simpan file di folder storage/public/uploads/photos
                $photo->storeAs('uploads/photos', $photoName, 'public');

                // Simpan nama file ke database
                $biodata['photo'] = $photoName;
            }

            // save personal data
            $personnel = Personnel::create($biodata);

            // save ame license
            $ameLicense =         AmeLicense::create($ameLicenseValidated);

            // save otr application
            $otrApplication = OtrApplication::create([
                'personnel_id' => $personnel->id,
                'user_id' => Auth::user()->id,
                'ame_license_id' => $ameLicense->id,
                'pic_coordinator_id' => $request->pic_coordinator_id,
                'submited_at' => now(),
            ]);

            // save type of rating training
            foreach ($typeOfRatingTrainingValidated['type_of_rating_training'] as $training) {
                // dd($training, $otrApplication->id);
                $data = [
                    'otr_application_id' => $otrApplication->id,
                    'course' => $training['course'],
                    'year' => $training['year'],
                ];
                RatingTraining::create($data);
            }

            // save basic license
            foreach ($basicLicenseValidated['basic_license'] as $license) {
                $data = [
                    'otr_application_id' => $otrApplication->id,
                    'category' => $license['category'],
                    'card_no' => $license['card_no'],
                ];
                BasicLicense::create($data);
            }

            // save lion air aircraft type
            foreach ($lionAirAircraftTypeValidated['lion_air_aircraft_type'] as $aircraftType) {
                // dd($otrApplication->id, $aircraftType);
                $data = [
                    'otr_application_id' => $otrApplication->id,
                    'air_craft_type' => $aircraftType['air_craft_type'],
                ];

                LionAirAirCraftType::create($data);
            }

            DB::commit();
            return redirect()->route('submission.index')->with('success', 'Data has been saved successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submission = OtrApplication::WithAllRelations()->find($id);

        return view('partials.show', [
            'submission' => $submission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
