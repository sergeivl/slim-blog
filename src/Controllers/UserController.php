<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostAllListService;
use App\Services\PostListService\PostListFactory;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Body;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends Controller {

    const SUBTEMPLATE = 'login';

    public function actionView(ResponseInterface $response, $pageNumber = 1)
    {

        $pageData = [
            'title' => 'Авторизация',
            'title_seo' => 'Авторизация',
            'meta_d' => '',
            'meta_k' => ''
        ];


        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);

    }


    public function actionLogin(Request $request, Response $response)
    {

        /** @var Body $body */
        $body = $request->getParsedBody();

        print_r($body);

    }
}