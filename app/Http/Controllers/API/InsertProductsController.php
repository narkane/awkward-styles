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
        $images = '';

        $err = [];

        foreach($dirs as $dir){
            $files = array_diff(scandir($d . "/" . $dir), array('..', '.'));

            foreach($files as $file){
                list($title, $type) = explode(".", $file);

                $image = DB::table('tbl_media_library')
                        ->select('id')
                        ->where('title', "=", $title)
                        ->first();

                $images .= $image->id . ",";
            }

            // CREATE PRODUCT
            $insertProduct = DB::table('tbl_products')
                    ->insert([
                        "image" => substr($images, 0, -1),
                        "shortDescription" => "Describing the product and all of it's information.",
                        "label" => "Label for product",
                        "mtime" => now(),
                        "ctime" => now(),

                        "netWeight" => '0.00',
                        "fullCaseOnly" => 0,
                        "styleId" => 8
                    ]);

            if(!$insertProduct){
                $err[] = "Error inserting product for " . $dir . ".";
            }

            $images = '';
        }

        return response()->json(((empty($err)) ? ['Success'] : $err));
    }

}