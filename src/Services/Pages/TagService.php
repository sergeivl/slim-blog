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
        $tag = $this->tag::where('alias', $alias)->first();
        if (!$tag) {
            throw new Exception('Tag not found');
        }
        return $tag->toArray();
    }

}