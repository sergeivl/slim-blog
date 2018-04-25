<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostListFactory;
use App\Services\PostListService\PostTagListService;
use Slim\Http\Response;

class TagController extends Controller {


    const SUBTEMPLATE = 'tag';

    public function actionIndex(Response $response, $alias, $pageNumber = null)
    {

        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_TAG, $alias);

        if (!$pageData) {
            return $response->withRedirect('/error/not-found');
        }

        /** @var PostTagListService $listService */
        $listService = $this->postListFactory->build(
            PostListFactory::TYPE_TAG,
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