<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ImageTemplateController extends Controller
{

    public function getTemplate($id, $size){
        $response = DB::table('templates')
            ->whereRaw('pid = ?', [$id])
            ->whereRaw('size = ?', [$size])
            ->first();

        if(!$response) {
            $response = new stdClass();

            $response->dpi = 0;
            $response->pid = 0;
            $response->size = 0;
        } else {
            $response->values = json_decode($response->values);
        }

        return response()->json($response);

    }

    public function insertTemplate(Request $request){

        $pid = $request->json('pid', null);
        $dpi = $request->json('dpi', null);
        $size = $request->json('size', null);
        $templates = $request->json('templates', null);

        if(is_null($pid) || is_null($dpi) || is_null($size) || is_null($templates)){
            return response()->json(['missing parameters']);
        }

        foreach($templates as $k => $v){
            if($v == null){
                unset($templates[$k]);
            }
        }

        // Create Query For Insert
        DB::table('templates')->updateOrInsert([
            'pid' => $pid,
            'size' => $size
        ],[
           'dpi' => $dpi,
            'values' => json_encode($templates)
        ]);

        $id = DB::table('templates')
            ->where([
                'pid' => $pid,
                'size' => $size,
                'dpi' => $dpi
            ])->first();

        return response()->json(['id' => ($id) ? $id->id : 0]);

    }

}