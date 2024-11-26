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
        $histories = OtrApplication::withAssessmentPersonnel()->where('pic_status', 'approved')->orderBy('pic_check_at', 'desc')->latest()->paginate(15);

        return view('quality-inspector.dashboard', [
            'histories' => $histories
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submission = OtrApplication::WithAllRelations()->find($id);

        return view('quality-inspector.show', [
            'submission' => $submission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function create(string $id)
    {
        $submission = OtrApplication::WithAllRelations()->find($id);
        return view('quality-inspector.create', [
            'submission' => $submission
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request, string $id)
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
            'assessment_material_10' => 'required|numeric|min:0|max:100',
            'assessment_material_11' => 'required|numeric|min:0|max:100',
            'assessment_material_12' => 'required|numeric|min:0|max:100',
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
            'etops_training' => 'nullable|required_if:etops,1|string|max:255',
            'rii_training' => 'nullable|required_if:rii,1|string|max:255',
        ], [
            'required_if' => 'This field is required when :other is checked.',
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
            $request->assessment_material_10,
            $request->assessment_material_11,
            $request->assessment_material_12,
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
                'etops_training' => $request->has('etops') ? $request->input('etops_training', null) : null,
                'rii_training' => $request->has('rii') ? $request->input('rii_training', null) : null,
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
                'assessment_material_10' => $request->assessment_material_10,
                'assessment_material_11' => $request->assessment_material_11,
                'assessment_material_12' => $request->assessment_material_12,
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

    public function edit(string $id)
    {
        $submission = OtrApplication::WithAllRelations()->find($id);
        return view('quality-inspector.edit', [
            'submission' => $submission
        ]);
    }

    public function update(Request $request, string $id)
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
            'assessment_material_10' => 'required|numeric|min:0|max:100',
            'assessment_material_11' => 'required|numeric|min:0|max:100',
            'assessment_material_12' => 'required|numeric|min:0|max:100',
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
            'etops_training' => 'nullable|required_if:etops,1|string|max:255',
            'rii_training' => 'nullable|required_if:rii,1|string|max:255',
        ], [
            'required_if' => 'This field is required when :other is checked.',
        ]);

        // Hitung hasil assessment
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
            $request->assessment_material_10,
            $request->assessment_material_11,
            $request->assessment_material_12,
        ];

        $totalMaterial = count($materials);
        $totalScore = array_sum($materials);
        $assessmentResult = ($totalScore / $totalMaterial);

        // Menentukan status
        $status = $assessmentResult >= 70 ? 'Pass' : 'Fail';

        DB::beginTransaction();
        try {
            // Cari data  berdasarkan ID
            $submission = OtrApplication::with(['assessment', 'assessment.authorizeLaca', 'assessment.mandatoryTraining'])
                ->findOrFail($id);

            $assessment = $submission->assessment;
            $authorizeLaca = $assessment->authorizeLaca ?? new AuthorizeLaca();
            $mandatory = $assessment->mandatoryTraining ?? new MandatoryTraining();

            // Update Authorize Laca
            $authorizeLaca->fill([
                'type' => $request->type,
                'no' => $request->no,
                'validy' => $request->validy,
                'mr' => $request->has('mr') ? true : false,
                'rii' => $request->has('rii') ? true : false,
                'etops' => $request->has('etops') ? true : false,
            ])->save();

            // Update  Mandatory Training
            $mandatory->fill([
                'human_factory' => $request->human_factory,
                'sms_training' => $request->sms_training,
                'rvsm_pbn_training' => $request->rvsm_pbn_training,
                'etops_training' => $request->has('etops') ? $request->input('etops_training', null) : null,
                'rii_training' => $request->has('rii') ? $request->input('rii_training', null) : null,
            ])->save();

            // Update data Assessment
            $assessment->fill([
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
                'assessment_material_10' => $request->assessment_material_10,
                'assessment_material_11' => $request->assessment_material_11,
                'assessment_material_12' => $request->assessment_material_12,
                'assessment_result' => $assessmentResult,
                'status' => $status,
                'asessed_at' => now(),
            ])->save();

            DB::commit();
            return redirect()->route('quality-inspector.index', $submission->id)
                ->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
