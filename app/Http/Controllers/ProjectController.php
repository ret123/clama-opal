<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function createForm() {
        return view ('projects.form');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            // 'category' => 'required',
            'title' => 'required',
            'project_description' => 'required|min:150',
            'project_objective' => 'required|min:250',
            'project_outcome' => 'required|min:250',
            // 'target_group' => 'required',
            'capacity' => 'required',
            // 'governate' => 'required',
            // 'town' => 'required',
            'project_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(empty($request->session()->get('project'))){
            $project = new \App\Models\Project;
            $project->fill($validatedData);
           
        }else{
            $project = $request->session()->get('project');
            $project->fill($validatedData);
           
        }

        $project->category = $request->input('category');
        $project->jobs = $request->input('jobs');
        $project->target_group = $request->input('target_group');
        $project->sme = $request->input('sme');
        $project->product_utilized = $request->input('product_utilized');
        $project->social_impact = $request->input('social_impact');
        $project->beneficiaries = $request->input('beneficiaries');
        $project->beneficiaries_description = $request->input('beneficiaries_description');
        $project->governate = $request->input('governate');
        $project->town = $request->input('town');

        // image upload
        $imageName = time().'.'.$request->project_image->extension();  
       
        $request->project_image->move(public_path('images'), $imageName);
        $project->project_image = 'images/'.$imageName;

        $request->session()->put('project', $project);
        // dd($project);

        return redirect()->route('milestones.create.form');
        
        


    }
}
