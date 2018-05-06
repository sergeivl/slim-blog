<?php namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Services\Admin\PageAdminService;
use App\Services\Pages\PageService;
use App\Services\PostListService\PostAllListService;

use Slim\Http\Request;
use Slim\Http\Response;

class AdminPageController extends Controller
{

    const SUBTEMPLATE_POST_INDEX = 'admin_page_index';
    const SUBTEMPLATE_POST_CREATE = 'admin_page_create';
    const SUBTEMPLATE_POST_UPDATE = 'admin_page_update';


    public function actionIndex(Response $response, PageAdminService $pageAdminService, $pageNumber = 1)
    {

        /** @var PostAllListService $listService */
        $pageList = $pageAdminService->getPageList();
        //$paginator = $listService->getPaginator();
        //$paginator->setUrlPattern('/admin/page/' . '(:num)');

        $pageData = [
            'title' => 'Управление страницами',
            'title_seo' => 'Управление страницами',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_POST_INDEX,
            'pageData' => $pageData,
            'pageList' => $pageList,
            //'paginator' => (string)$paginator,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);
    }

    public function actionCreate(Request $request, Response $response, PageAdminService $pageAdminService)
    {
        if ($body = $request->getParsedBody()) {
            $pageAdminService->save($body);
        }

        $pageData = [
            'title' => 'Создание страницы',
            'title_seo' => 'Создание страницы',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_POST_CREATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList,
        ]);
    }

    public function actionUpdate($id, Request $request, Response $response, PageAdminService $pageAdminService, PageService $pageService)
    {
        if ($body = $request->getParsedBody()) {
            $pageAdminService->save($body, $id);
        }

        $pageData = [
            'title' => 'Редактирование страницы',
            'title_seo' => 'Редактирование страницы',
            'meta_d' => '',
            'meta_k' => ''
        ];

        $categoryList = $this->categoryListService->getAllCategories();
        $tagList = $this->tagListService->getAllTags();

        $pageFields = $pageService->getDataById($id);

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE_POST_UPDATE,
            'pageData' => $pageData,
            'pageFields' => $pageFields,
            'categoryList' => $categoryList,
            'tagList' => $tagList,
        ]);
    }

    public function actionDelete($id, PageAdminService $pageAdminService, Response $response)
    {
        $pageAdminService->delete($id);
        return $response->withRedirect('/admin/page');
    }

}