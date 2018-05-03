<?php namespace App\Services\Pages;

use App\Models\Category;

class CategoryService
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getDataByAlias($alias)
    {
        if (!$category = $this->category->where('alias', $alias)->first()) {
            return false;
        }
        return $category->toArray();
    }

    public function getDataById($id)
    {
        if (!$category = $this->category->where('id', $id)->first()) {
            return false;
        }
        return $category->toArray();
    }


}