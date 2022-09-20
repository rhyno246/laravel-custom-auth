<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;
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

    public function reset (Request $request , $token = null) {
        return view('reset')->with(['token' => $token, 'email' => $request->email]);
    }

    
    public function resetPost (Request $request){

    }

    public function forgotPost (Request $request) {
        $token = Str::random(64);
        $email = $request->email;
        \DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token
        ]);
        $action_link = route('reset', ['token' => $token, 'email'=>$email]);
        $body = "Chúng tôi nhận được yêu cầu thay đổi password từ bạn với email là " . $email . ' ' . "Bạn có thể reset lại password bằng cách nhấn vào link phía dưới";
        \Mail::send('template', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('test@gmail.com', 'ShopOnline');
            $message->to($request->email, 'ShopOnline')->subject('ShopOnline reply reset password');
        });
        return back()->with('success', 'Chúng tôi có email reset lại password mới cho bạn');
    }

}
