<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function createForm() {

        return view('finance.form');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'item_description' => 'required',
            'cost' => 'required',


        ]);

        if (empty($request->session()->get('finance'))) {
            $finance = new \App\Models\Finance;
        } else {
            $finance = $request->session()->get('finance');
        }

        $count = count($request->input('item_description'));
        $data = array();
        for ($i = 0; $i < $count; $i++) {
            if (!empty($request->input('item_description')[$i])) {
                array_push($data, array(
                    'item_description' => $request->input('item_description')[$i],
                    'cost' => $request->input('cost')[$i],

                ));
            }
        }
        // $finance = collect($data);
        $request->session()->put('finance', $data);
        // dd($finance);

        return redirect()->route('document.create.form');
    }
}
