<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostListFactory;
use App\Services\PostListService\PostTagListService;
use Psr\Http\Message\ResponseInterface;

class TagController extends Controller {


    const SUBTEMPLATE = 'tag';

    public function actionIndex(ResponseInterface $response, $alias, $pageNumber = null)
    {
        /** @var PostTagListService $listService */
        $listService = $this->postListFactory->build(
            PostListFactory::TYPE_TAG,
            $pageNumber,
            10,
            $alias
        );

        $postList = $listService->getList();
        $paginator = $listService->getPaginator();

        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_TAG, $alias);

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