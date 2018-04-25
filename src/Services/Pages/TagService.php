<?php namespace App\Services\Pages;

use App\Models\Tag;
use Symfony\Component\Config\Definition\Exception\Exception;

class TagService
{
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getData($alias)
    {
        if (! $tag = $this->tag::where('alias', $alias)->first()) {
            return false;
        }
        return $tag->toArray();
    }

}