<?php
namespace App\Http\Services;
use App\Repositories\ArtistStorefrontRepository;

class ArtistStorefrontService
{
    protected $artistProducts;

	public function __construct(ArtistStorefrontRepository $artistProducts)
	{
		$this->artistProducts = $artistProducts;
	}

	public function index()
	{
        $product_list = $this->artistProducts->all();
        return $product_list;
    }
    public function test() {
        echo "Hi";
    }
}