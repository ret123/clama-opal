<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request) {
        $request->session()->forget('company');
        $request->session()->forget('project');
        $request->session()->forget('milestone');
        $request->session()->forget('finance');

        $validatedData = $request->validate([
            'company_type' => 'required',
            'company_number' => 'exclude_if:company_number,null|required|unique:companies',
           
            'company_name' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required'
        ]);

        if(empty($request->session()->get('company'))){
            $company = new \App\Models\Company();
            $company->fill($validatedData);
     
        }else{
            $company = $request->session()->get('company');
            $company->fill($validatedData);
           
        }
        $company->company_type = $request['company_type'];
        $company->country = $request->input('country');
        $company->website = $request->input('website');
        $company->twitter = $request->input('twitter');
        $company->linkedin = $request->input('linkedin');
        $company->facebook = $request->input('facebook');
        $request->session()->put('company', $company);
      

        // dd($company);

        return redirect()->route('companies.organizations.create.form');

    }

    public function createOrganizationForm() {

        $organizations = \App\Models\Organization::all();
        return view('companies.organizations-form',compact('organizations'));
    }

    public function storeOrganizations(Request $request) {
        $validatedData = $request->validate([
            'organization_status' => 'required',
            // 'organization_description' => 'required|min:500'
            
        ]);

        $company = $request->session()->get('company');
        
        $company->organization_status = $request->input('organization_status');
        $company->organization_description =  $request->input('organization_description');

        // dd($company);

       return redirect()->route('projects.create.form');
        

    }
}
