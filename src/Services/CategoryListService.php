<?php namespace App\Services;

use App\Models\Category;

class CategoryListService
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAllCategories()
    {
        return $this->category->all()->toArray();
    }

    public function getCategoriesOfPost($postId)
    {

    }
}