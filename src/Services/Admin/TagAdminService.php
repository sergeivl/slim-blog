<?php namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Page;
use App\Models\Tag;

class TagAdminService
{

    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getCategoryList()
    {
        return $this->tag->all()->toArray();
    }

    public function save($categoryData, $categoryId = null)
    {
        if ($categoryId) {
            $tag = $this->tag::find($categoryId);
        } else {
            $tag = $this->tag;
        }

        return $this->saveCategory($tag, $categoryData);
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

    public function delete($tagId)
    {
        if (!$this->tag->find($tagId)->delete()) {
            throw new \Exception('Ошибка удаления категории', 500);
        }
    }


}