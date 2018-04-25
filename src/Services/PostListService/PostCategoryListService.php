<?php namespace App\Services\PostListService;

use App\Models\Category;
use App\Models\Post;
use App\Services\PaginationService;

class PostCategoryListService extends PostListService
{
    private $paginationService;
    private $alias;
    private $post;
    private $category;
    private $categoryId;


    public function __construct(PaginationService $paginationService, Post $post, Category $category)
    {
        $this->paginationService = $paginationService;
        $this->post = $post;
        $this->category = $category;
    }

    public function getList()
    {
        $offset = ($this->pageNumber - 1) * $this->limit;
        $categoryId = $this->getCategoryId();

        $posts = $this->post->whereHas('categoryTaxonomy', function ($query) use ($categoryId) {
            $query->where('category_id', '=', $categoryId);
        })->skip($offset)->take($this->limit)->get()->toArray();

        return $posts;
    }

    private function getCategoryId()
    {
        $category = $this->category->where('alias', '=', $this->alias)->first();
        return $category->id;
    }


    private function getCountOfPost()
    {
        $categoryId = $this->getCategoryId();
        $count = $this->post->whereHas('categoryTaxonomy', function ($query) use ($categoryId) {
            $query->where('category_id', '=', $categoryId);
        })->count();
        return $count;
    }


    public function getPaginator()
    {
        $totalItems = $this->getCountOfPost();

        $urlPattern = '/' . $this->alias . '/'  . '(:num)';

        $this->paginationService->setTotalItems($totalItems);
        $this->paginationService->setCurrentPage($this->pageNumber);
        $this->paginationService->setUrlPattern($urlPattern);

        return $this->paginationService;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

}