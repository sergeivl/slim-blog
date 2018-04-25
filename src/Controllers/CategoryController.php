<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostCategoryListService;
use App\Services\PostListService\PostListFactory;
use Psr\Http\Message\ResponseInterface;

class CategoryController extends Controller {

    const SUBTEMPLATE = 'category';

    public function actionIndex(ResponseInterface $response, $alias, $pageNumber = null)
    {
        /** @var PostCategoryListService $listService */
        $listService = $this->postListFactory->build(
            PostListFactory::TYPE_CATEGORY,
            $pageNumber,
            10,
            $alias
        );

        $postList = $listService->getList();
        $paginator = $listService->getPaginator();

        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_CATEGORY, $alias);

        $categoryList = $this->categoryListService->getAllCategories();

        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE,
            'pageData' => $pageData,
            'postList' => $postList,
            'paginator' => (string)$paginator,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);
    }

}