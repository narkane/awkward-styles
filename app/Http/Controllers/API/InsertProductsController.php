<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class InsertProductsController extends Controller
{

    public function index(Request $request){

        $d = '../public/products';

        $dirs = array_diff(scandir($d), array('..', '.'));

        foreach($dirs as $dir){
            $files = array_diff(scandir($d . "/" . $dir), array('..', '.'));

            foreach($files as $file){
                list($title, $type) = explode(".", $file);
                $ins = DB::table('tbl_media_library')
                    ->insert([
                        'thumbnail' => null,
                        'full_url' => "/products/" . $dir . "/" . $file,
                        'title' => $title,
                        'position' => null,
                        'alttext' => null,
                        'type' => 'image',
                        'status' => null,
                        'mtime' => null,
                        'ctime' => now()
                    ]);
            }
        }

        return response()->json(['Done homie!']);
    }

}