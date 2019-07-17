<?php

namespace App\Http\Controllers\Api;

use App\DesignLibrary;
use App\DesignPrints;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;


/**
 * Class DesignLibraryController
 * @package App\Http\Controllers\Api
 *
 * CRUD API for designs REQUIRES USER ID
 *
 * read ALL
 *
 * read
 *
 * create --> placed into model
 *
 * update --> placed into model
 *
 * delete
 *
 */

class DesignLibraryController extends Controller
{

    /**
     * DesignLibraryController constructor.
     * Add authentication middleware and set the USERS id.
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Fetch and return all libraries, if no ID was supplied. Otherwise fetches only 1 library.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchLibrary(Request $request, $id = null){

        $library = (is_null($id)) ?
            DesignLibrary::where('user_id','=',Auth::user()->getAuthIdentifier())->get() :
            DesignLibrary::where('user_id','=',Auth::user()->getAuthIdentifier())->where('id', '=', $id)->get();

        $libraries = [];

        foreach($library as $lib){
            $prints = DesignPrints::find($lib->id)->get();

            $libraries = [
                'id' => $lib->id,
                'image_url' => $this->mkUrl($lib),
                'prints' => $prints
            ];
        }
        return response()->json($libraries);
    }

    /**
     * Delete library from database
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeLibrary(Request $request, $id){
        $response = [];

        $library = DesignLibrary::where('user_id', '=', Auth::user()->getAuthIdentifier())->where('id','=',$id)->delete();

        if($library){
            $response['status'] = 'success';
        } else {
            $response['status'] = 'failed';
            $response['reason'] = 'delete';
        }

        return response()->json($response);
    }

    /**
     * Generates a URL for the image
     * @param $lib
     * @return string
     */
    public static function mkUrl($lib){
        return url('/') . "/designs/" . $lib->id . "/" . $lib->image_url;
    }

}
