<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;
class OrderController extends Controller
{
    public function index () {
        $countries = Country::all();
        $states = State::all();
        return view('country.index' , compact('countries', 'states'));
    }
}
