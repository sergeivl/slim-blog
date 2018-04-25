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
        if (!$category = $this->category->where('alias', $alias)->first()) {
            return false;
        }
        return $category->toArray();
    }


}