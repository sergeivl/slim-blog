<?php namespace App\Services\Admin;

use App\Models\Page;

class PageAdminService
{

    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function getPageList()
    {
        return $this->page->all()->toArray();
    }

    public function save($pageData, $pageId = null)
    {
        if ($pageId) {
            $page = $this->page::find($pageId);
        } else {
            $page = $this->page;
        }

        return $this->savePage($page, $pageData);
    }

    public function savePage(Page $page, $pageData)
    {
        /** @var Page $page */
        $page->title = $pageData['title'];
        $page->title_seo = $pageData['title_seo'];
        $page->meta_d = $pageData['meta_d'];
        $page->meta_k = $pageData['meta_k'];
        $page->text = $pageData['text'];
        $page->alias = $pageData['alias'];


        if (!$page->save()) {
            throw new \Exception('Ошибка сохранения страницы', 500);
        }

        return true;
    }

    public function delete($pageId)
    {
        if (!$this->page->find($pageId)->delete()) {
            throw new \Exception('Ошибка удаления страницы', 500);
        }
    }


}