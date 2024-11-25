<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AuthorizeLaca;
use App\Models\MandatoryTraining;
use App\Models\OtrApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QualityInspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = OtrApplication::with(['personnel', 'assessment'])->where('pic_status', 'approved')->orderBy('pic_check_at', 'desc')->latest()->get();

        return view('quality-inspector.dashboard', [
            'histories' => $histories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function assessment(string $id)
    {
        $submission = OtrApplication::WithAllRelations()->find($id);
        return view('quality-inspector.assessment', [
            'submission' => $submission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function postAssessment(Request $request, string $id)
    {

        $assessmentMaterialValidated = $request->validate([
            'assessment_material_1' => 'required|numeric|min:0|max:100',
            'assessment_material_2' => 'required|numeric|min:0|max:100',
            'assessment_material_3' => 'required|numeric|min:0|max:100',
            'assessment_material_4' => 'required|numeric|min:0|max:100',
            'assessment_material_5' => 'required|numeric|min:0|max:100',
            'assessment_material_6' => 'required|numeric|min:0|max:100',
            'assessment_material_7' => 'required|numeric|min:0|max:100',
            'assessment_material_8' => 'required|numeric|min:0|max:100',
            'assessment_material_9' => 'required|numeric|min:0|max:100',
        ]);

        $authorizationLacaValidated = $request->validate([
            'type' => 'required',
            'no' => 'required',
            'validy' => 'required',
            'mr' => 'nullable|boolean',
            'rii' => 'nullable|boolean',
            'etops' => 'nullable|boolean',
        ]);


        $mandatoryTrainingValidated = $request->validate([
            'human_factory' => 'required',
            'sms_training' => 'required',
            'rvsm_pbn_training' => 'required',
            'etops_training' => 'nullable',
            'rii_training' => 'nullable',
        ]);


        // Menggunakan array untuk menyimpan nilai material
        $materials = [
            $request->assessment_material_1,
            $request->assessment_material_2,
            $request->assessment_material_3,
            $request->assessment_material_4,
            $request->assessment_material_5,
            $request->assessment_material_6,
            $request->assessment_material_7,
            $request->assessment_material_8,
            $request->assessment_material_9,
        ];

        // Hitung hasil assessment
        $totalMaterial = count($materials);
        $totalScore = array_sum($materials);
        $assessmentResult = ($totalScore / $totalMaterial);

        // Menentukan status
        $status = $assessmentResult >= 70 ? 'Pass' : 'Fail';

        DB::beginTransaction();
        try {
            // save authorize laca
            $authorizeLaca = AuthorizeLaca::create([
                'type' => $request->type,
                'no' => $request->no,
                'validy' => $request->validy,
                'mr' => $request->has('mr') ? true : false,
                'rii' => $request->has('rii') ? true : false,
                'etops' => $request->has('etops') ? true : false,
            ]);

            // save mandatory
            $mandatory = MandatoryTraining::create([
                'human_factory' => $request->human_factory,
                'sms_training' => $request->sms_training,
                'rvsm_pbn_training' => $request->rvsm_pbn_training,
                'etops_training' => $request->has('etops_training') ? true : false,
                'rii_training' => $request->has('rii_training') ? true : false,
            ]);


            // save data assessment
            $assessment = Assessment::create([
                'quality_inspector_id' => Auth::user()->id,
                'authorize_laca_id' => $authorizeLaca->id,
                'mandatory_training_id' => $mandatory->id,
                'assessment_material_1' => $request->assessment_material_1,
                'assessment_material_2' => $request->assessment_material_2,
                'assessment_material_3' => $request->assessment_material_3,
                'assessment_material_4' => $request->assessment_material_4,
                'assessment_material_5' => $request->assessment_material_5,
                'assessment_material_6' => $request->assessment_material_6,
                'assessment_material_7' => $request->assessment_material_7,
                'assessment_material_8' => $request->assessment_material_8,
                'assessment_material_9' => $request->assessment_material_9,
                'assessment_result' => $assessmentResult,
                'status' => $status,
                'asessed_at' => now()
            ]);
            // Update aplikasi terkait dengan ID assessment
            $submission = OtrApplication::find($id);
            $submission->assessment_id = $assessment->id;
            $submission->save();

            DB::commit();
            return redirect()->route('quality-inspector.index', $submission->id)
                ->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
