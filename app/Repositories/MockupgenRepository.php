<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
class MockupgenRepository
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
        $qry = "select mp.id as product_id, mp.code as product_code, mp.label as product_name, (select mpr.value as product_price from mshop_product as mp 
        left join mshop_product_list as mpl on mpl.parentid = mp.id 
        left join mshop_price as mpr on mpr.id = mpl.refid
        where mpl.pos = 0 and mpl.domain in ('price') and mp.id = ".$productId." ) as product_price, mm.preview as image_url from mshop_product as mp 
        left join mshop_product_list as mpl on mpl.parentid = mp.id 
        left join mshop_media as mm on mm.id = mpl.refid
        where mpl.pos = 0 and mpl.domain in ('media') and mp.id = ".$productId;
        $products = DB::select($qry);
    return $products;
  }

  public function artworkProduct()
  {
        $qry = "select * from tbl_art_work";
        $artworkProduct = DB::select($qry);
        return $artworkProduct;
  }

  public function artworkCategories()
  {
        $qry = "select * from tbl_art_category";
        $artworkCat = DB::select($qry);
        return $artworkCat;
  }

  public function getProductsImages($productId)
  {
    $qry = "select mp.id as product_id, mm.preview as image_url from mshop_product as mp 
            left join mshop_product_list as mpl on mpl.parentid = mp.id 
            left join mshop_media as mm on mm.id = mpl.refid
            where mpl.domain in ('media') and mp.id = ".$productId;
    $products = DB::select($qry);
    return $products;
  }

}