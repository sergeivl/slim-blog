<?php namespace App\Services\PostListService;

use App\Models\Post;
use App\Services\PaginationService;

class PostAllListService extends PostListService
{
    private $paginationService;
    private $post;

    public function __construct(PaginationService $paginationService, Post $post)
    {
        $this->paginationService = $paginationService;
        $this->post = $post;
    }

    public function getList()
    {
        $offset = ($this->pageNumber - 1) * $this->limit;
        $posts = $this->post->skip($offset)->take($this->limit)->get()->toArray();
        return $posts;
    }

    private function getCountOfPost()
    {
        $count =$this->post->get()->count();
        return $count;
    }

    public function getPaginator()
    {
        $totalItems = $this->getCountOfPost();

        $urlPattern = '/' . '(:num)';

        $this->paginationService->setTotalItems($totalItems);
        $this->paginationService->setCurrentPage($this->pageNumber);
        $this->paginationService->setUrlPattern($urlPattern);

        return $this->paginationService;
    }


}