<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MockgenController extends Controller
{

    private $sessionLimit = 1000000;

    /**
     * Set Session Information
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setSession(Request $request)
    {

        $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];

        // TODO: Image Checks
        $image = ($request->hasFile('file')) ? $request->file('file') : null;

        if(!is_null($image) && !in_array($image->getMimeType(), $allowedMimeTypes) ){
            return response()->json([
                'status' => 'error',
            'message' => 'Must be an Image',
                'type' => $image->getMimeType()]);
        }

        $name = $request->input('name',null);
        $object = $request->input('myObject', null);

        // Set temporary
        if($image != null) {
            $image->storePubliclyAs("/public", $name . "." . $image->getClientOriginalExtension());

            $object = substr($object, 0,-1) . ',"src":"'
                . url("/storage") . "/" . $name ."."
                . $image->getClientOriginalExtension() . '"}';
        }

        // Be sure that items don't conflict
        $objects = $request->session()->get('canvas_objects', null);

        if ($objects) {
            $replacer = false;
            foreach ($objects as $oldName => $obj) {
                if ($name == $oldName) {
                    // OverWrite
                    $replacer = $name;
                }
            }

            if ($replacer) {
                $src = explode(",", $objects[$replacer]);
                $objects[$replacer] = (substr($object, 0,-1) . "," . $src[count($src) - 1]);
            } else {
                $objects[$name] = ($object);
            }

            if (count($objects) > $this->sessionLimit) {
                return response()->json(['status' => 'error', 'message' => 'Too Much Data']);
            } else {
                $request->session()->put('canvas_objects', $objects);
            }

        } else {
            // Create New Session
            $arr = [];
            $arr[$name] = ($object);
            $request->session()->put('canvas_objects', $arr);
        }
        return response()->json(['status' => 'completed']);
    }

    /**
     * Get the Session Information
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSession(Request $request)
    {
        $data = $request->session()->get('canvas_objects', []);

        if(count($data) > 0) {
            foreach ($data as $d => $info) {
                $data[$d] = json_decode($info);
            }
        }

        return response()->json($data);
    }

    /**
     * Remove particular object form session by  name
     * @param Request $request
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeObject(Request $request, $name){
        $data = $request->session()->get('canvas_objects', []);

        if(count($data) > 0){
            foreach($data as $d => $info){
                if($d == $name){
                    unset($data[$d]);
                }
            }
        }

        $request->session()->put('canvas_objects', $data);

        return response()->json(['status' => 'successful']);
    }

    /**
     * Flush all Session Information
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function flushSession(Request $request){
        $request->session()->remove('canvas_objects');
        return response()->json(['status' => 'complete']);
    }
}
