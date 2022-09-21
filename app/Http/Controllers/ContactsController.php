<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Session;

class ContactsController extends Controller
{
    public function index () {
        return view('contacts.index');
    }

    public function sendMessage (Request $request) {
        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'message' => $request->message
        ];
        \Mail::to('tanbashop@gmail.com')->send(new ContactMail($data));
        Session::flash('success', 'Cảm ơn bạn đã góp cmn ý');
        return redirect()->route('contatcs.index');
    }
}
