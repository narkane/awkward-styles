<?php

namespace App\Http\Controllers\API;

use App\DesignLibrary;
use App\DesignPrints;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DesignPrintsController extends Controller
{
    /**
     * DesignPrintsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Fetch the Print Layout by ID
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchPrintById(Request $request, $id){
        $print = DesignPrints::where('id','=',$id)->first();

        if($print != null){
            $lib = DesignLibrary::where('user_id','=',Auth::user()->getAuthIdentifier())->where('id','=',$print->library_id)->first();

            if($lib) {
                $print->image_url = DesignLibraryController::mkUrl($lib);
                return response()->json($print);
            }
        }
        return response()->json(['status' => 'failed']);
    }

    /**
     * Fetch the Print Layout by LIBRARY ID AND SIZE
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchPrintByLibraryAndSize(Request $request){
        $lib_id = ($request->has('library_id')) ? $request->input('library_id') : null;
        $size = ($request->has('size')) ? $request->input('size') : null;

        $print = DesignPrints::where('library_id','=',$lib_id)->where('size','=',strtoupper($size))->first();

        if($print != null){
            $lib = DesignLibrary::where('user_id','=',Auth::user()->getAuthIdentifier())->where('id','=',$print->library_id)->first();

            if($lib) {
                $print->image_url = DesignLibraryController::mkUrl($lib);
                return response()->json($print);
            }
        }
        return response()->json(['status' => 'failed']);
    }

    /**
     * Create a Print fo rthe Library
     * @param Request $request
     */
    public function createPrint(Request $request){

        $validate = Validator::make($request->all(),[
            'library_id' => 'required:numeric',
            'x' => 'required:numeric',
            'y' => 'required:numeric',
            'pid' => 'numeric',
            'size' => 'required'
        ]);

        if(!$validate->fails()) {

            $lib_id = ($request->input('library_id') == 0) ? DesignLibrary::createOrUpdate($request) : $request->input('library_id');

            $identifier = DesignPrints::updateOrCreate([
                'library_id' => $lib_id,
                'size' => $request->input('size'),
                'pid' => $request->input('pid')
            ],[
                'x' => $request->input('x'),
                'y' => $request->input('y'),
                'width' => getimagesize($request->file('design'))[0],
                'height' => getimagesize($request->file('design'))[1]
            ]);

            if($identifier){

                $print = DesignPrints::find($identifier->id)->first();

                return response()->json($print);

            }

        }

        return response()->json(['status'=>'failed']);


    }

    /**
     * Remove the Print by ID
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request, $id){

        $print = DesignPrints::where('id','=',$id);

        $printFirst = $print->first();

        if($printFirst != null && (DesignLibrary::where('user_id','=',Auth::user()->getAuthIdentifier())->where('id','=',$printFirst->library_id)->first()) != null){
            $print->delete();
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status'=>'failed']);

    }
}
