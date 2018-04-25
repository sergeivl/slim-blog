<?php namespace App\Services\Pages;

use App\Models\Page;

class PageService
{
    private $page;
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getData($alias)
    {
        return $this->page::where('alias', $alias)->first()->toArray();
    }

}