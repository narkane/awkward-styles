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

        $name = $request->input('name',null);
        $object = $request->input('myObject', null);

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
                $objects[$replacer] = ($object);
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
            $request->session()->put('canvas_objects', [$name => ($object)]);
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
