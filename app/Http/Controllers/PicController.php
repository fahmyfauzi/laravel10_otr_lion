<?php

namespace App\Http\Controllers;

use App\Models\OtrApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = OtrApplication::withAssessmentPersonnel()->latest()->paginate(15);
        return view('pic-coordinator.dashboard', [
            'histories' => $histories
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id,)
    {
        $submission = OtrApplication::WithAllRelations()->find($id);

        return view('pic-coordinator.show', [
            'submission' => $submission
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update status
        $submission = OtrApplication::find($id);
        $submission->pic_status = $request->status;
        $submission->pic_coordinator_id  = Auth::user()->id;
        $submission->pic_check_at = now();
        $submission->save();

        return redirect()->route('pic.index')->with('success', 'Status updated successfully');
    }
}
