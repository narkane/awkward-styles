<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffiliatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Affiliates.affiliates');
    }

    public function dashboard(){
        return view('Affiliates.dashboard');
    }
}

