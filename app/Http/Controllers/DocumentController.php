<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function createForm() {

        return view('document.form');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
           'company_registration' => 'required|mimes:pdf|max:2048',
            'vat_registration' => 'required|mimes:pdf|max:2048',
            // 'doc_1' => 'required|mimes:pdf|max:2048',
            // 'doc_2' =>'required|mimes:pdf|max:2048'
        ]);

        $document = new \App\Models\Document();

          // file uploads
          $file1 = time().'-reg'.'.'.$request->company_registration->extension();  
       
          $request->company_registration->move(public_path('documents'), $file1);
          $document->company_registration = 'documents/'.$file1;

          $file2 = time().'-vat'.'.'.$request->vat_registration->extension();  
       
          $request->vat_registration->move(public_path('documents'), $file2);
          $document->vat_registration = 'documents/'.$file2;

          if ($request->hasFile('doc_1')) {
            $file3 = time().'.'.$request->doc_1->extension();  
       
          $request->doc_1->move(public_path('documents'), $file3);
          $document->doc_1 = 'documents/'.$file3;
          }   

          if ($request->hasFile('doc_2')) {
            $file4 = time().'.'.$request->doc_2->extension();  
       
          $request->doc_2->move(public_path('documents'), $file4);
          $document->doc_2 = 'documents/'.$file4;
          }   


        // Save company details
        $company = $request->session()->get('company');
        $company->organization_status = json_encode($company->organization_status);
    
        $company->save();

        // Save project details
        $project = $request->session()->get('project');
        $project->company_id = $company->id;
        $project->save();

        // Save milestone details
        $milestone = $request->session()->get('milestone');
       
        //  dd($milestone[0]);
         foreach($milestone as $items ) {
          $newMilestone = new \App\Models\Milestone();
            $newMilestone->activity_phase = $items['activity_phase'];
            $newMilestone->duration = $items['duration'];
            $newMilestone->duration_type = $items['duration_type'];
           $newMilestone->company_id = $company->id;
            $newMilestone->save();
           
          };
         
      
    

        // Save finance details
        $finance = $request->session()->get('finance');
       
        foreach($finance as $items) {
          $newFinance = new \App\Models\Finance();
            $newFinance->item_description = $items['item_description'];
            $newFinance->cost = $items['cost'];
            $newFinance->company_id = $company->id;
            $newFinance->save();
        }
        

        // save document details

        $document->company_id = $company->id;
        $document->save();

        // remove session data
        $request->session()->forget('company');
        $request->session()->forget('project');
        $request->session()->forget('milestone');
        $request->session()->forget('finance');
       

        return redirect()->route('success.route');
        
       


    }
}
