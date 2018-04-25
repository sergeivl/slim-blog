<?php namespace App\Services;

use App\Models\Tag;

class TagListService
{
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getAllTags()
    {
        return $this->tag->all()->toArray();
    }

    public function getTagsOfPost($postId)
    {

    }
}