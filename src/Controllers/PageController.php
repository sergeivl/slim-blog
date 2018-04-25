<?php namespace App\Controllers;

use App\Services\Pages\PageDataFactory;
use Psr\Http\Message\ResponseInterface;

class PageController extends Controller {

    const SUBTEMPLATE = 'page';

    public function actionView(ResponseInterface $response, $alias)
    {

        $pageData = $this->pageDataFactory->build(PageDataFactory::TYPE_PAGE, $alias);
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