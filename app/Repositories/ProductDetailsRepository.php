<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
class ProductDetailsRepository
{

  public function __construct()
  {
      //initialization
  }
  
  public function all($productId)
  {
    // $qry = "select mp.id as product_id, mp.label as product_name, mm.preview as image_url, mpri.value as product_price from mshop_product as mp 
        // left join mshop_product_list as mpl on mpl.parentid = mp.id 
        // left join mshop_media as mm on mm.id = mpl.refid
        // left JOIN mshop_price as mpri on mpri.id = mpl.refid
        // where mpl.pos = 0 and mpl.domain in ('media','price')";
        $qry = "select mp.id as product_id, mp.code as product_code, mp.label as product_name, mm.preview as image_url from mshop_product as mp 
        left join mshop_product_list as mpl on mpl.parentid = mp.id 
        left join mshop_media as mm on mm.id = mpl.refid
        where mpl.pos = 0 and mpl.domain in ('media') and mp.id = ".$productId;
        $products = DB::select($qry);
    return $products;
  }

}