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

            $response->x = 0;
            $response->y = 0;
            $response->width = 0;
            $response->height = 0;
            $response->dpi = 0;
            $response->pid = 0;
            $response->size = 0;
        }

        return response()->json($response);

    }

    public function insertTemplate(Request $request){

        if(!$request->has('pid') || !$request->has('size')){
            return response()->json(['id' => 0]);
        }

        // Create Query For Insert
        DB::table('templates')->updateOrInsert([
            'pid' => $request->input('pid'),
            'size' => $request->input('size')],[
            'x' => ($request->has('x')) ? $request->input('x') : 0,
            'y' => ($request->has('y')) ? $request->input('y') : 0,
            'width' => ($request->has('width')) ? $request->input('width') : 0,
            'height' => ($request->has('height')) ? $request->input('height') : 0,
            'dpi' => ($request->has('dpi')) ? $request->input('dpi') : 0
        ]);

        $id = DB::table('templates')
            ->where([
                'pid' => $request->input('pid'),
                'size' => $request->input('size'),
                'x' => ($request->has('x')) ? $request->input('x') : 0,
                'y' => ($request->has('y')) ? $request->input('y') : 0,
                'width' => ($request->has('width')) ? $request->input('width') : 0,
                'height' => ($request->has('height')) ? $request->input('height') : 0,
                'dpi' => ($request->has('dpi')) ? $request->input('dpi') : 0
            ])->first();

        return response()->json(['id' => ($id) ? $id->id : 0]);

    }

}