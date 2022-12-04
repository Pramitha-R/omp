<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\User;
use App\Models\amount;
use App\Models\prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    public function register(){
        return view('register');
    }
    public function storeNewCustomer(Request $request){
        $request ->validate([
            
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'dob'=>'required',
            'status'=>'required',
            'password' => 'required',
            
        ]);
        $checktoAdmin = User::where('email', '=', $request->get('email'))->first();
        if($checktoAdmin == null){
            customer::create($request->all());
            return redirect('/');
        }
        else{
            return back()->with('error','same email ,plz change the mail');
        }
        

    }
    public function index(){
        return view('customer/dashboard');
    }
    public function prescriptionPage(customer $customer)
    {
        return view('customer/prescriptionPage',compact('customer'));
    }
    public function storeprescription(Request $request){
       // dd($request->all());
        $request ->validate([
            
            'note'=>'required',
            'address'=>'required',
            'time'=>'required',
            'custemail'=>'required',
        ]);


        $input=$request->all();
        if($request->hasFile('image1')){
            $request->file('image1')->move(public_path('imgages/prescription'), $request->file('image1')->getClientOriginalName());
            $request->image = ' ' . $request->file('image1')->getClientOriginalName();
            $input['image1']=$request->image;
            
        }
        
        
            prescription::create($input);
            return back()->with('success','successfull add prescription');
       
    }
    public function showprice(customer $customer)
    {
        $amounts =DB::table('amounts')
            ->where('amounts.custemail','=',$customer->email)->get();


        
        return view('customer/prescription/showamountdetail',compact('amounts','customer'));
            
        
        
    }
    public function cansalOrder(Request $request,customer $customer)
    {
        
        $cansaledorder=customer::where('status','=',$request->get('cansaled'))->first();
       // $cansalOrder=customer::where('status','=','cansaled')->first();
        
        $request->validate([
             'status' => 'required',
        ]);
        $customer->update($request->only('status')); 
        return back();
    }
    public function cansalOrderByAdmin(Request $request,customer $customer)
    {
        $cansalOrderByAdmin=customer::where('status','=',$request->get('cansal'))->first();
        $request->validate([
            'status' => 'required',
       ]);
       $customer->update($request->only('status')); 
       return back();
    }
}
