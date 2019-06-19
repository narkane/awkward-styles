<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
class ArtistStorefrontRepository
{

  public function __construct()
  {
      //initialization
  }
  
  public function all()
  {
    // $qry = "select mp.id as product_id, mp.label as product_name, mm.preview as image_url, mpri.value as product_price from mshop_product as mp 
        // left join mshop_product_list as mpl on mpl.parentid = mp.id 
        // left join mshop_media as mm on mm.id = mpl.refid
        // left JOIN mshop_price as mpri on mpri.id = mpl.refid
        // where mpl.pos = 0 and mpl.domain in ('media','price')";
        /*$qry1 = "select mp.id as product_id, mp.code as product_code, mp.label as product_name, mm.preview as image_url from mshop_product as mp 
        left join mshop_product_list as mpl on mpl.parentid = mp.id 
        left join mshop_media as mm on mm.id = mpl.refid
        where mpl.pos = 0 and mpl.domain in ('media')";
        $qry2 = "select mp.id as product_id, mp.label as product_name, mpri.value as product_price from mshop_product as mp 
        left join mshop_product_list as mpl on mpl.parentid = mp.id 
        left JOIN mshop_price as mpri on mpri.id = mpl.refid
        where mpl.pos = 0 and mpl.domain in ('price')";
        $products1 = DB::select($qry1);
        $products2 = DB::select($qry2);        
        $i = 0;
        foreach($products1 as $products) {
            foreach($products2 as $product) {
                if($product->product_id === $products->product_id) {
                    $products1[$i]->product_price = $product->product_price;
                }
            }
            $i++;
        }
        
    return $products1;*/
  }

  public function allProducts()
  {
    // $qry = "select mp.id as product_id, mp.label as product_name, mm.preview as image_url, mpri.value as product_price from mshop_product as mp 
        // left join mshop_product_list as mpl on mpl.parentid = mp.id 
        // left join mshop_media as mm on mm.id = mpl.refid
        // left JOIN mshop_price as mpri on mpri.id = mpl.refid
        // where mpl.pos = 0 and mpl.domain in ('media','price')";
        $qry1 = "select mp.id as product_id, mp.code as product_code, mp.label as product_name, mm.preview as image_url from mshop_product as mp 
        left join mshop_product_list as mpl on mpl.parentid = mp.id 
        left join mshop_media as mm on mm.id = mpl.refid
        where mpl.pos = 0 and mpl.domain in ('media')";
        $qry2 = "select mp.id as product_id, mp.label as product_name, mpri.value as product_price from mshop_product as mp 
        left join mshop_product_list as mpl on mpl.parentid = mp.id 
        left JOIN mshop_price as mpri on mpri.id = mpl.refid
        where mpl.pos = 0 and mpl.domain in ('price')";
        $products1 = DB::select($qry1);
        $products2 = DB::select($qry2);        
        $i = 0;
        foreach($products1 as $products) {
            foreach($products2 as $product) {
                if($product->product_id === $products->product_id) {
                    $products1[$i]->product_price = $product->product_price;
                }
            }
            $i++;
        }
    return $products1;
  }

}