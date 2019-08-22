<?php

namespace App\Http\Controllers;

use App\ArtistDesigns;
use App\Storefront;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageDesignsController extends Controller
{

    public function index(Request $request){

        $user_id = (Auth::check()) ? Auth::user()->getAuthIdentifier() : null;

        $sort = ($request->has("sort")) ? $request->input("sort") : null;

       if($sort !== null || is_numeric($sort)){
           $designs = ArtistDesigns::where("artist_id", "=", $user_id)
               ->whereRaw("FIND_IN_SET(?,storefronts)",[$sort])
               ->get();
       } else {
           $designs = ArtistDesigns::where("artist_id", "=", $user_id)->get();
       }

        // Get Storefront IDS
        $storefronts = Storefront::select("id","name")->where('user_id', '=', $user_id)->get();

        return view('ManageDesigns.index', [
            'designs' => $designs,
            'storefronts' => $storefronts,
            'user_id' => $user_id
        ]);

    }

}
