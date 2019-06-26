<?php
namespace App\Http\Services;
use App\Repositories\MockupgenRepository;
use App\Repositories\ArtistStorefrontRepository;

class MockupgenService
{
    protected $mockupgen, $artistStoreFront;

	public function __construct(MockupgenRepository $mockupgen, ArtistStorefrontRepository $artistStoreFront)
	{
		$this->mockupgen = $mockupgen;
		$this->artistStoreFront = $artistStoreFront;
	}

	public function index($productId)
	{
        	$product_details = $this->mockupgen->all($productId);
        	return $product_details;
	}
	
	public function artworkProduct() {
		$artworkProduct = $this->mockupgen->artworkProduct();
        	return $artworkProduct;
	}

	public function artworkCategories() {
		$artworkCat = $this->mockupgen->artworkCategories();
        return $artworkCat;
	}

	public function getProductsImages($productId)
	{
        $product_images = $this->mockupgen->getProductsImages($productId);
        return $product_images;
	}

	public function getProductsList()
	{
        $product_images = $this->artistStoreFront->allProducts();
        return $product_images;
	}
}