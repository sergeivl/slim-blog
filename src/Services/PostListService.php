<?php namespace App\Services;

use App\Models\Category;
use App\Models\Page;

class PostListService
{
    private $paginationService;
    private $pageModel;
    private $categoryModel;

    public function __construct(PaginationService $paginationService, Page $pageModel, Category $categoryModel)
    {
        $this->paginationService = $paginationService;
        $this->pageModel = $pageModel;
        $this->categoryModel = $categoryModel;
    }

    public function getAll($pageNumber = 1)
    {
        $list = [];

        for ($i = 1; $i <= 12; $i++) {
            $list[] = [
                'id' => $i,
                'title' => 'Это тестовая статья ' . $i,
                'text' => 'Текст тестовой статьи' . $i,
                'alias' => 'one' . $i
            ];
        }

        return $list;
    }

    public function getPageDataForCategory()
    {

    }

    public function getPageDataForMainPage()
    {
        $pageData = Page::where('alias', 'main')->first()->toArray();
        return $pageData;
    }

    public function getByCategory($pageNumber = 1, $categoryAlias = null)
    {
        $list = [];

        for ($i = 1; $i <= 12; $i++) {
            $list[] = [
                'id' => $i,
                'title' => 'Это тестовая статья ' . $i,
                'text' => 'Текст тестовой статьи' . $i,
                'alias' => 'one' . $i
            ];
        }

        return $list;
    }

    private function getCountOfPost($pageNumber = 1, $categoryAlias = null)
    {
        return count($this->getAll());
    }

    public function getPaginator($pageNumber = 1, $categoryAlias = null)
    {
        $totalItems = $this->getCountOfPost();

        $urlPattern = '/'. ($categoryAlias ? $categoryAlias . '/' : '')  .'(:num)';

        $this->paginationService->setTotalItems($totalItems);
        //$this->paginationService->setItemsPerPage($itemsPerPage);
        $this->paginationService->setCurrentPage($pageNumber);
        $this->paginationService->setUrlPattern($urlPattern);

        return $this->paginationService;
    }

}