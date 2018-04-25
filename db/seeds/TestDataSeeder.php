<?php


use Phinx\Seed\AbstractSeed;

class TestDataSeeder extends AbstractSeed
{
    public function run()
    {
        $this->setPages();
        $this->setCategories();
        $this->setTags();
        $this->setPosts();
        $this->setPostsCategoryTaxonomies();
        $this->setPostsTagsTaxonomies();
    }

    private function setPages()
    {
        $list = [];

        $list[] = [
            'title' => 'Это главная страница',
            'text' => 'Текст главной страницы',
            'alias' => 'main'
        ];

        for ($i = 1; $i <= 12; $i++) {
            $list[] = [
                'title' => 'Это тестовая страница один ' . $i,
                'text' => 'Текст тестовой статьи' . $i,
                'alias' => 'page-alias-' . $i
            ];
        }
        $this->table('page')->insert($list)->save();
    }

    private function setCategories()
    {
        $list = [];

        for ($i = 1; $i <= 6; $i++) {
            $list[] = [
                'title' => 'Категория ' . $i,
                'text' => 'Текст категории номер ' . $i,
                'alias' => 'category-alias-' . $i
            ];
        }

        $this->table('category')->insert($list)->save();
    }


    private function setTags()
    {
        $list = [];

        for ($i = 1; $i <= 6; $i++) {
            $list[] = [
                'title' => 'Тег ' . $i,
                'text' => 'Текст тега ' . $i,
                'alias' => 'tag-alias-' . $i
            ];
        }

        $this->table('tag')->insert($list)->save();
    }


    private function setPosts()
    {
        $list = [];

        for ($i = 1; $i <= 12; $i++) {
            $list[] = [
                'title' => 'Пост номер ' . $i,
                'text' => 'Текст тестового поста ' . $i,
                'alias' => 'post-alias-' . $i
            ];
        }

        $this->table('post')->insert($list)->save();
    }

    private function setPostsCategoryTaxonomies()
    {
        $list = [];

        $list[] = [
            'post_id' => 1,
            'category_id' => 1,
        ];
        $list[] = [
            'post_id' => 2,
            'category_id' => 1,
        ];

        $list[] = [
            'post_id' => 3,
            'category_id' => 1,
        ];

        $list[] = [
            'post_id' => 4,
            'category_id' => 2,
        ];

        $list[] = [
            'post_id' => 5,
            'category_id' => 2,
        ];

        $list[] = [
            'post_id' => 6,
            'category_id' => 3,
        ];

        $list[] = [
            'post_id' => 7,
            'category_id' => 3,
        ];

        $list[] = [
            'post_id' => 8,
            'category_id' => 4,
        ];

        $list[] = [
            'post_id' => 9,
            'category_id' => 5,
        ];

        $list[] = [
            'post_id' => 10,
            'category_id' => 6,
        ];

        $list[] = [
            'post_id' => 11,
            'category_id' => 6,
        ];

        $list[] = [
            'post_id' => 12,
            'category_id' => 6,
        ];

        $this->table('category_taxonomy')->insert($list)->save();
    }

    private function setPostsTagsTaxonomies()
    {
        $list = [];

        $list[] = [
            'post_id' => 12,
            'tag_id' => 1,
        ];
        $list[] = [
            'post_id' => 11,
            'tag_id' => 1,
        ];

        $list[] = [
            'post_id' => 10,
            'tag_id' => 1,
        ];

        $list[] = [
            'post_id' => 9,
            'tag_id' => 2,
        ];

        $list[] = [
            'post_id' => 8,
            'tag_id' => 2,
        ];

        $list[] = [
            'post_id' => 7,
            'tag_id' => 3,
        ];

        $list[] = [
            'post_id' => 6,
            'tag_id' => 3,
        ];

        $list[] = [
            'post_id' => 5,
            'tag_id' => 4,
        ];

        $list[] = [
            'post_id' => 4,
            'tag_id' => 5,
        ];

        $list[] = [
            'post_id' => 3,
            'tag_id' => 6,
        ];

        $list[] = [
            'post_id' => 2,
            'tag_id' => 6,
        ];

        $list[] = [
            'post_id' => 1,
            'tag_id' => 6,
        ];

        $this->table('tag_taxonomy')->insert($list)->save();
    }

}
