<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;
class OrderController extends Controller
{
    public function index () {
        return view('country.index');
    }
}
