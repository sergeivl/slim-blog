<?php namespace App\Controllers\Admin;

use App\Services\Admin\CategoryAdminService;
use App\Controllers\Controller;
use App\Services\Admin\TagAdminService;
use App\Services\Pages\CategoryService;
use Slim\Http\Request;
use Slim\Http\Response;


class AdminTagController extends Controller
{
    const SUBTEMPLATE_TAG_INDEX = 'admin_tag_index';
    const SUBTEMPLATE_TAG_CREATE = 'admin_tag_create';
    const SUBTEMPLATE_TAG_UPDATE = 'admin_tag_update';

    public function actionIndex(Response $response)
    {
        $pageData = [
            'title' => 'Управление тегами',
            'title_seo' => 'Управление тегами',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_TAG_INDEX,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);
    }

    public function actionCreate(Request $request, Response $response, CategoryAdminService $categoryAdminService)
    {

        if ($body = $request->getParsedBody()) {
            $categoryAdminService->save($body);
        }

        $pageData = [
            'title' => 'Создание категории',
            'title_seo' => 'Создание страницы',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_TAG_CREATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList,
        ]);
    }

    public function actionUpdate(
        Request $request,
        Response $response,
        CategoryAdminService $categoryAdminService,
        CategoryService $categoryService,
        $id
    )
    {
        if ($body = $request->getParsedBody()) {
            $categoryAdminService->save($body, $id);
        }

        $pageData = [
            'title' => 'Создание категории',
            'title_seo' => 'Создание страницы',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        $categoryData = $categoryService->getDataById($id);

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_TAG_UPDATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList,
            'categoryData' => $categoryData
        ]);
    }

    public function actionDelete($id, TagAdminService $tagAdminService, Response $response)
    {
        $tagAdminService->delete($id);
        return $response->withRedirect('/admin/tag');
    }

}