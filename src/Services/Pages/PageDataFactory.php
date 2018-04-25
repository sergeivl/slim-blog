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

    public function build($type, $alias)
    {
        switch ($type) {
            case self::TYPE_PAGE :
                return $this->pageService->getData($alias);
                break;
            case self::TYPE_CATEGORY :
                return $this->categoryService->getData($alias);
                break;
            case self::TYPE_TAG :
                return $this->tagService->getData($alias);
                break;
            case self::TYPE_POST :
                return $this->postService->getData($alias);
                break;
            default :
                throw new \Exception('Неизвестный типа для рендера страницы', 404);
        }
    }
}