<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\prescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view ('admin/dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function customerprescription(){
        $customers = DB::table('customers')
            ->join('prescriptions', 'prescriptions.custemail', '=', 'customers.email')
            ->select('customers.name','customers.status','customers.id', 'customers.email','customers.address','customers.dob', 'customers.mobile')
            ->get();
        return view('admin.showPrescription',compact('customers'));
    }

    public function viewprescription(customer $customer)
    {
        $prescription=DB::table('prescriptions')
            ->where('prescriptions.custemail','=',$customer->email)->get();
        //return view('admin/viewprescription',compact('prescription'));
        
        //$prescription=prescription::where('custemail','=',$customer->email)->first();
        return view('admin/viewprescription',compact('prescription'));

        
    
        
        
        
                
    }
    public function addprice(prescription $prescription)
    {
        return view('admin.addprice',compact('prescription'));
    }
}
