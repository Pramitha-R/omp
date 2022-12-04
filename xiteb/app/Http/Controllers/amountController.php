<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\amount;
use App\Models\prescription;
use App\Models\customer;

class amountController extends Controller
{
    function getTotalAmount(Request $request ){
        $request ->validate([

            'drug'=>'required',
            'price'=>'required',
            'count'=>'required',
            'total'=>'required',
            'custemail'=>'required',            
        ]);
        $amount=amount::create($request->all());
        return back()->with('success','amount add succesfully');
    }
}
