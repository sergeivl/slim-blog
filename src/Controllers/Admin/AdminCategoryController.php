<?php namespace App\Controllers\Admin;

use App\Services\PostListService\PostAllListService;
use App\Services\PostListService\PostListFactory;
use App\Controllers\Controller;
use Slim\Http\Response;


class AdminCategoryController extends Controller
{
    const SUBTEMPLATE = 'category_admin';

    public function actionIndex(Response $response, $pageNumber = 1)
    {
        $listService = $this->postListFactory->build(PostListFactory::TYPE_NO, $pageNumber, 10);

        /** @var PostAllListService $listService */
        $postList = $listService->getList();
        $paginator = $listService->getPaginator();

        $pageData = [
            'title' => 'Управление категориями',
            'title_seo' => 'Управление категориями',
            'meta_d' => '',
            'meta_k' => ''
        ];

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

    public function actionCreate()
    {

    }

    public function actionUpdate()
    {

    }

    public function actionDelete()
    {

    }

}