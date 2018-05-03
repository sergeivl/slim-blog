<?php namespace App\Services\Pages;

use App\Models\Post;

class PostService
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getDataByAlias($alias)
    {
        if (!$post = $this->post::where('alias', $alias)->first()) {
            return false;
        }
        return $post->toArray();
    }

    public function getDataById($id)
    {
        if (!$post = $this->post::where('id', $id)->first()) {
            return false;
        }
        return $post->toArray();
    }

}