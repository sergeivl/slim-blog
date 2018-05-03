<?php namespace App\Services\Pages;

class PageDataFactory
{
    const TYPE_PAGE = 0;
    const TYPE_CATEGORY = 1;
    const TYPE_TAG = 2;
    const TYPE_POST = 3;

    private $pageService;
    private $categoryService;
    private $tagService;
    private $postService;

    public function __construct(PageService $pageService,
                                CategoryService $categoryService,
                                TagService $tagService,
                                PostService $postService)
    {
        $this->pageService = $pageService;
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->tagService = $tagService;
    }

    public function build($type, $alias = null, $id = null)
    {
        if ($alias) {
            return $this->getDataByAlias($type, $alias);
        } elseif($id) {
            return $this->getDataById($type, $id);
        }

        throw new \Exception('Отсутствует идентификатор страницы', 500);

    }

    private function getDataByAlias($type, $alias)
    {
        switch ($type) {
            case self::TYPE_PAGE :
                return $this->pageService->getDataByAlias($alias);
                break;
            case self::TYPE_CATEGORY :
                return $this->categoryService->getDataByAlias($alias);
                break;
            case self::TYPE_TAG :
                return $this->tagService->getDataByAlias($alias);
                break;
            case self::TYPE_POST :
                return $this->postService->getDataByAlias($alias);
                break;
            default :
                throw new \Exception('Неизвестный типа для рендера страницы', 404);
        }
    }

    private function getDataById($type, $id)
    {
        switch ($type) {
            case self::TYPE_PAGE :
                return $this->pageService->getDataById($id);
                break;
            case self::TYPE_CATEGORY :
                return $this->categoryService->getDataById($id);
                break;
            case self::TYPE_TAG :
                return $this->tagService->getDataByAlias($id);
                break;
            case self::TYPE_POST :
                return $this->postService->getDataById($id);
                break;
            default :
                throw new \Exception('Неизвестный типа для рендера страницы', 404);
        }
    }

}