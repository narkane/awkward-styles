<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->getAuthIdentifier() != null ){
            // Redirect to Dashboard
            return redirect('dashboard');
        } else {
            // Redirect to login
            return redirect('login');
        }

        return view('home');
    }
}
