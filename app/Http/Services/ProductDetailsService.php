<?php
namespace App\Http\Services;
use App\Repositories\ProductDetailsRepository;

class ProductDetailsService
{
    protected $productDetails;

	public function __construct(ProductDetailsRepository $productDetails)
	{
		$this->productDetails = $productDetails;
	}

	public function index($productId)
	{
        $product_details = $this->productDetails->all($productId);
        return $product_details;
	}
}