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

    public function getTemplate(){
        $response = DB::table('templates')
            ->whereRaw('id = ?', [$id])->first();

        if(!$response) {
            $response = new stdClass();

            $response->x = 0;
            $response->y = 0;
            $response->width = 0;
            $response->height = 0;
            $response->dpi = 0;
            $response->pid = 0;
        }

        return response()->json($response);

    }

    public function insertTemplate(Request $request){

        // Create Query For Insert
        $id = DB::table('templates')->insertGetId([
            'x' => ($request->has('x')) ? $request->get('x') : 0,
            'y' => ($request->has('y')) ? $request->get('y') : 0,
            'width' => ($request->has('width')) ? $request->get('width') : 0,
            'height' => ($request->has('height')) ? $request->get('height') : 0,
            'pid' => ($request->has('pid')) ? $request->get('pid') : 0
        ]);

        return response()->json(['id' => ($id) ? $id : 0]);

    }

}