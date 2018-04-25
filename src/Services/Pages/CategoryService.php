<?php namespace App\Services\Pages;

use App\Models\Category;

class CategoryService
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getData($alias)
    {
        return $this->category->where('alias', $alias)->first()->toArray();
    }


}