<?php namespace App\Services\Admin;

use App\Models\CategoryTaxonomy;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagTaxonomy;

class PostAdminService
{
    private $post;
    private $categoryTaxonomy;
    private $tag;

    public function __construct(Post $post, CategoryTaxonomy $categoryTaxonomy, Tag $tag)
    {
        $this->post = $post;
        $this->categoryTaxonomy = $categoryTaxonomy;
        $this->tag = $tag;
    }

    public function save($postData, $postId = null)
    {
        if ($postId) {
            $post = $this->post::find($postId);
        } else {
            $post = $this->post;
        }

        return $this->savePost($post, $postData);
    }

    public function delete($postId)
    {
        if (!$this->post->find($postId)->delete()) {
            throw new \Exception('Ошибка удаления поста', 500);
        }
    }

    private function savePost(Post $post, $postData)
    {
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

        $this->savePostTaxonomy($post->id, $postData['categories'] ?? []);


        $tags = [];
        if ($postData['tags']) {
            $tags = explode(',', $postData['tags']);
            foreach ($tags as $key => $tag) {
                $tags[$key] = trim($tag);
            }
        }

        $this->saveTagTaxonomy($post->id, $tags);

        return $post->id;
    }

    private function savePostTaxonomy($postId, $categories)
    {
        // Выгружаем имеющиеся таксономии
        $categoryTaxonomies = $this->categoryTaxonomy->where('post_id', $postId)->get();

        // Исключаем из добавления те categoryId, которые есть в массиве
        foreach ($categoryTaxonomies as $categoryTaxonomy) {
            /** @var CategoryTaxonomy $categoryTaxonomy */
            $key = array_search($categoryTaxonomy->category_id, $categories);
            if ($key !== false) {
                unset($categories[$key]);
            } else {
                $categoryTaxonomy->delete();
            }
        }

        foreach ($categories as $categoryId) {
            $categoryTaxonomy = new CategoryTaxonomy();
            $categoryTaxonomy->category_id = $categoryId;
            $categoryTaxonomy->post_id = $postId;
            $categoryTaxonomy->save();
        }
    }

    private function saveTagTaxonomy($postId, $tags)
    {
        $tagsFromBase = $this->tag->whereHas('tagTaxonomy', function ($query) use ($postId) {
            $query->where('post_id', '=', $postId);
        })->get();



        foreach ($tagsFromBase as $tagFromBase) {
            $key = array_search($tagFromBase->title, $tags);
            if ($key !== false) {
                unset($tags[$key]);
            } else {

                $tagTaxonomy = TagTaxonomy::where('tag_id', $tagFromBase->id)->where('post_id', $postId)->first();
                $tagTaxonomy->delete();
            }
        }


        //var_dump($tags);
        //die();


        foreach ($tags as $tag) {
            $tagModel = Tag::firstOrCreate(['title' => $tag]);
            $tagModel->title = $tag;
            $tagModel->alias = $tag;
            $tagModel->save();


            $tagTaxonomy = new TagTaxonomy;
            $tagTaxonomy->tag_id = $tagModel->id;
            $tagTaxonomy->post_id = $postId;
            $tagTaxonomy->save();
        }
    }
}