<?php

namespace App\Http\Controllers\API;

use App\ArtistDesigns;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignController extends Controller
{

    public function removeDesign(Request $request){
        $error = null;

        if(Auth::check()){
            $id = Auth::user()->getAuthIdentifier();
            $design_id = ($request->has('design_id')) ? $request->input('design_id') : 0;

            $remove = ArtistDesigns::where("artist_id", "=", $id)
                ->where("id", "=", $design_id)
                ->delete();

            if($remove){
                return response()->json(['status' => 'success']);
            } else {
                $error = "IDs Don't Match";
            }
        }
        return response()->json(['status' => 'error', 'msg' => $error]);
    }

}
