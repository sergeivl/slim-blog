<?php namespace App\Controllers;

use App\Services\AuthService;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends Controller {

    const SUBTEMPLATE = 'login';

    public function actionView(Request $request, Response $response, AuthService $authService, $pageNumber = 1)
    {

        if ($authService->check()) {
            return $response->withRedirect('/');
        }

        $pageData = [
            'title' => 'Авторизация',
            'title_seo' => 'Авторизация',
            'meta_d' => '',
            'meta_k' => ''
        ];


        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();
        $errors = ['auth' => $request->getQueryParam('errors')];


        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList,
            'errors' => $errors
        ]);

    }


    public function actionLogin(Request $request, Response $response, AuthService $authService)
    {

        if ($request->isPost()) {

            $formData = $request->getParsedBody();

            $isAuth = $authService->attempt(
                $formData['email'],
                $formData['password']
            );

            if ($isAuth) {
                return $response->withRedirect('/admin/panel');
            }
        }

        return $response->withRedirect('/user/login?errors=1');
    }
}