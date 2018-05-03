<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class PostController extends Controller {

    const SUBTEMPLATE = 'post';

    public function actionView(Request $request, Response $response, $alias)
    {
        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_POST, $alias);

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