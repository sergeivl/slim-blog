<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostCategoryListService;
use App\Services\PostListService\PostListFactory;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;

class CategoryController extends Controller {

    const SUBTEMPLATE = 'category';

    public function actionIndex(Response $response, $alias, $pageNumber = null)
    {
        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_CATEGORY, $alias);

        if (!$pageData) {
            return $response->withRedirect('/error/not-found');

        }

        /** @var PostCategoryListService $listService */
        $listService = $this->postListFactory->build(
            PostListFactory::TYPE_CATEGORY,
            $pageNumber,
            10,
            $alias
        );

        $postList = $listService->getList();
        $paginator = $listService->getPaginator();


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