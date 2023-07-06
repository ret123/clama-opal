<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function createForm()
    {
        return view('milestones.form');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'activity_phase' => 'required',
            'duration' => 'required',
            'duration_type' => 'required'

        ]);

        if (empty($request->session()->get('milestone'))) {
            $milestone = new \App\Models\Milestone;
        } else {
            $milestone = $request->session()->get('milestone');
        }

        $count = count($request->input('activity_phase')); 
        $data = array();
        for ($i = 0; $i < $count; $i++) {
            if (!empty($request->input('activity_phase')[$i])) {
                array_push($data, array(
                    'activity_phase' => $request->input('activity_phase')[$i],
                    'duration' => $request->input('duration')[$i],
                    'duration_type' => $request->input('duration_type')[$i]
                ));
            }
        }
        $milestone = collect($data);
        $request->session()->put('milestone', $milestone);
        // dd($milestone);

        return redirect()->route('finance.create.form');
    }
}
