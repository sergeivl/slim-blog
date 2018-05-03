<?php namespace App\Services\Admin;

use App\Models\Post;

class PostAdminService
{
    private $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function save($postData, $postId = null)
    {
        if ($postId) {
            $post = $this->post::find($postId);
        } else {
            $post = $this->post;
        }

        /** @var Post $post */
        $post->title = $postData['title'];
        $post->title_seo = $postData['title_seo'];
        $post->meta_d = $postData['meta_d'];
        $post->meta_k = $postData['meta_k'];
        $post->text = $postData['text'];
        $post->preview_text = $postData['preview_text'];
        $post->alias = $postData['alias'];

        if (!$post->save()) {
            throw new \Exception('Ошибка сохранения поста', 500);
        }

        return $post->id;
    }

    public function delete($postId)
    {
        if (!$this->post->find($postId)->delete()) {
            throw new \Exception('Ошибка удаления поста', 500);
        }
    }

    private function savePost()
    {

    }

    private function savePostTaxonomy()
    {

    }
}