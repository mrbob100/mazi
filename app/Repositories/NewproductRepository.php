<?php
namespace Corp\Repositories;
use Corp\Models\Newproduct;
class NewproductRepository extends Repository
{
    public function __construct(Newproduct $product)
    {
        $this->model=$product;
    }
}