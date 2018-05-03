<?php namespace App\Controllers\Admin;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\Controller;

class AdminPanelController extends Controller
{
    const SUBTEMPLATE = 'panel';

    public function actionView(Request $request, Response $response)
    {
        $pageData = [
            'title' => 'Панель администратора',
            'title_seo' => 'Панель администратора',
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




}