<?php namespace App\Controllers\Admin;

use App\Services\Admin\CategoryAdminService;
use App\Controllers\Controller;
use App\Services\Pages\CategoryService;
use Slim\Http\Request;
use Slim\Http\Response;


class AdminCategoryController extends Controller
{
    const SUBTEMPLATE_CATEGORY_INDEX = 'admin_category_index';
    const SUBTEMPLATE_CATEGORY_CREATE = 'admin_category_create';
    const SUBTEMPLATE_CATEGORY_UPDATE = 'admin_category_update';

    public function actionIndex(Response $response, $pageNumber = 1)
    {
        $pageData = [
            'title' => 'Управление категориями',
            'title_seo' => 'Управление категориями',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_CATEGORY_INDEX,
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
            'subtemplate' => self::SUBTEMPLATE_CATEGORY_CREATE,
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
            'subtemplate' => self::SUBTEMPLATE_CATEGORY_UPDATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList,
            'categoryData' => $categoryData
        ]);
    }

    public function actionDelete($id, CategoryAdminService $categoryAdminService, Response $response)
    {
        $categoryAdminService->delete($id);
        return $response->withRedirect('/admin/category');
    }

}