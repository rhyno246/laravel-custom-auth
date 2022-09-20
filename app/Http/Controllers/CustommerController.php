<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;
use Session;

class CustommerController extends Controller
{
    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function register () {
        return view('register');
    }
    public function login () {
        return view('login');
    }

    public function loginAuth (Request $request ) {
        $user = $this->customer->where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->name);
                return redirect()->route('welcome');
            }else{
                return back()->with('fail', 'pass ko trùng');
            }
        }else{
            return back()->with('fail', 'tài khoản chưa đăng kí');
        }
    }
    public function registerAuth (Request $request) {
        $user = $this->customer->create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        $request->session()->put('loginId', $user->name);
        return redirect()->route('welcome');
    }
    public function welcome () {
        return view('welcome');
    }
    public function logout () {
       if(session()->has('loginId')){
            session()->pull('loginId');
            return redirect()->route('login');
       }
    }


    public function forgot () {
        return view('forgot');
    }
}
