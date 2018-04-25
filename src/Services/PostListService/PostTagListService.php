<?php namespace App\Services\PostListService;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PaginationService;

class PostTagListService extends PostListService
{
    private $paginationService;
    private $alias;
    private $post;
    private $tag;


    public function __construct(PaginationService $paginationService, Post $post, Tag $tag)
    {
        $this->paginationService = $paginationService;
        $this->post = $post;
        $this->tag = $tag;
    }

    public function getList()
    {
        $offset = ($this->pageNumber - 1) * $this->limit;
        $tagId = $this->getTagId();

        $posts = $this->post->whereHas('tagTaxonomy', function ($query) use ($tagId) {
            $query->where('tag_id', '=', $tagId);
        })->skip($offset)->take($this->limit)->get()->toArray();

        return $posts;
    }

    private function getTagId()
    {
        $tag = $this->tag->where('alias', '=', $this->alias)->first();
        return $tag->id;
    }


    private function getCountOfPost()
    {
        $tagId = $this->getTagId();
        $count = $this->post->whereHas('tagTaxonomy', function ($query) use ($tagId) {
            $query->where('tag_id', '=', $tagId);
        })->count();
        return $count;
    }

    public function getPaginator()
    {
        $totalItems = $this->getCountOfPost();

        $urlPattern = '/tag/'. $this->alias . '/'  .'(:num)';

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