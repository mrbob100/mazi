<?php
namespace Corp\Repositories;
use Corp\Models\Category;
class CategoriesRepository extends Repository
{
    public function __construct(Category $category)
    {
        $this->model=$category;
    }


}