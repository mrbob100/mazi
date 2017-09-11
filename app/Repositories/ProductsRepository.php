<?php
namespace Corp\Repositories;
use Corp\Models\Product;

class ProductsRepository extends Repository
{

    public function __construct(Product $product)
    {
        $this->model=$product;
    }

}