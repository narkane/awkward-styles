<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
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
        $user_id = Auth::user()->id;
        $storefronts = DB::SELECT('select id,name from tbl_store_front where user_id=? order by id DESC LIMIT 4',[$user_id]);
        return view('createstore',['storefronts'=>$storefronts]);
    }

    public function myAccount(Request $request) {

        if($request->isMethod('POST')){
            if(!$this->updateAccount($request)) {
                session()->flash('error', 'There was an error updating your account details.');
            }
        }

        $user_id = Auth::user()->id;
        $result = DB::table('users')
            ->where('id', '=', $user_id)->first();
                                                                                                                     
        return view('account',['menu'=>'account','menuitem'=>'myaccount','user_details' => $result, 'token'=>$this->getToken()]);
    }

    /**
     * Update the Users Account Details
     * @param Request $request
     * @return mixed
     */
    private function updateAccount(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            //'email' => 'required'
        ]);

        return DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->update([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'business_name' => ($request->has('businessname')) ? $request->input('businessname') : null,
                'city' => ($request->has('city')) ? $request->input('city') : null,
                'country' => ($request->has('country')) ? $request->input('country') : null,
                'about_you' => ($request->has('about_you')) ? $request->input('about_you') : null,
                'facebook' => ($request->has('facebook')) ? $request->input('facebook') : null,
                'twitter' => ($request->has('twitter')) ? $request->input('twitter') : null,
                'instagram' => ($request->has('instagram')) ? $request->input('instagram') : null,
                'pinterest' => ($request->has('pinterest')) ? $request->input('pinterest') : null,
                'youtube' => ($request->has('youtube')) ? $request->input('youtube') : null
            ]);
    }
}
