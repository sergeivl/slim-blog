<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostAllListService;
use App\Services\PostListService\PostListFactory;
use Psr\Http\Message\ResponseInterface;

class SiteController extends Controller {

    const SUBTEMPLATE = 'main-page';
    const MAIN_PAGE_ALIAS = 'main';

    public function actionIndex(ResponseInterface $response, $pageNumber = 1)
    {
        $listService = $this->postListFactory->build(PostListFactory::TYPE_NO, $pageNumber, 10);

        /** @var PostAllListService $listService */
        $postList = $listService->getList();
        $paginator = $listService->getPaginator();
        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_PAGE, self::MAIN_PAGE_ALIAS);
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

}