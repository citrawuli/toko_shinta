<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $ip = '140.213.10.52'; //For static IP address get
        $ip = request()->ip(); //Dynamic IP address get, stevebauman cant work in localhost
        if ($position = Location::get($ip)) {
            $countryName= $position->countryName;
            $cityName= $position->cityName;
        } else {
            $countryName= "Can't fetch location data.";
            $cityName= "Err!!!";
        }    
        return view('ui-master-dash',compact('countryName', 'cityName'));
    }
}
