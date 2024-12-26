<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class Locationcontroller extends Controller
{
    //
    public function index()
    {
        $countries = Country::all();
        print_r($countries);
        return view("user.index", compact("countries"));
    }
}
