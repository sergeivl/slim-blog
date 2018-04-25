<?php namespace App\Controllers;

use Slim\Http\Response;

class ErrorController extends Controller
{
    const SUBTEMPLATE = '404';
    public function actionNotFound(Response $response)
    {
        $pageData = [
            'title' => 'Ошибка 404',
            'title_seo' => 'Ошибка 404',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        $response->withStatus('404');

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);
    }
}