<?php namespace App\Services\Pages;

use App\Models\Post;

class PostService
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getData($alias)
    {
        return $this->post::where('alias', $alias)->first()->toArray();
    }

}