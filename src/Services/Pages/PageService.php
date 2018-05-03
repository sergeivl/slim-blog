<?php namespace App\Services\Pages;

use App\Models\Page;

class PageService
{
    private $page;
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getDataByAlias($alias)
    {
        if (!$page = $this->page::where('alias', $alias)->first()) {
            return false;
        }
        return $page->toArray();
    }

    public function getDataById($id)
    {
        if (!$page = $this->page::where('id', $id)->first()) {
            return false;
        }
        return $page->toArray();
    }
}