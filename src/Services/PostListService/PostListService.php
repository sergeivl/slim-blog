<?php namespace App\Services\PostListService;

abstract class PostListService
{
    protected $pageNumber;
    protected $limit;

    abstract public function getList();
    abstract public function getPaginator();

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
    }
}