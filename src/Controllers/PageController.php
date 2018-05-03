<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use Slim\Http\Request;
use Slim\Http\Response;

class PageController extends Controller {

    const SUBTEMPLATE = 'page';

    public function actionView(Response $response, Request $request, $alias)
    {

        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_PAGE, $alias);

        if (!$pageData) {
            ($this->notFoundHandler)($request, $response);
        }

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);

    }

}