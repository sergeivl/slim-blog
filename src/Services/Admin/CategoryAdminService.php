<?php namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Page;

class CategoryAdminService
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategoryList()
    {
        return $this->category->all()->toArray();
    }

    public function save($categoryData, $categoryId = null)
    {
        if ($categoryId) {
            $category = $this->category::find($categoryId);
        } else {
            $category = $this->category;
        }

        return $this->saveCategory($category, $categoryData);
    }

    public function saveCategory(Category $category, $categoryData)
    {
        /** @var Page $page */
        $category->title = $categoryData['title'];
        $category->title_seo = $categoryData['title_seo'];
        $category->meta_d = $categoryData['meta_d'];
        $category->meta_k = $categoryData['meta_k'];
        $category->text = $categoryData['text'];
        $category->alias = $categoryData['alias'];

        if (!$category->save()) {
            throw new \Exception('Ошибка сохранения категории', 500);
        }

        return true;
    }

    public function delete($categoryId)
    {
        if (!$this->category->find($categoryId)->delete()) {
            throw new \Exception('Ошибка удаления категории', 500);
        }
    }


}