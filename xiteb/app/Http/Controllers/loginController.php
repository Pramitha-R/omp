<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\customer;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        $customer = customer::where('email', '=', $request->get('email'))->first();
        if (Auth::attempt($user_data)) {
            return redirect('/Admindash');
        } else if ($customer != null) {
            if (Hash::check($user_data['password'], $customer->password));
            return view('customer/dashboard', compact('customer'));
        } else {
            return back()->with('error', 'whoops sothing wrong ');
        }
    }
}
