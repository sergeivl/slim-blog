<?php namespace App\Controllers;

use App\Models\Tag;
use App\Services\PaginationService;
use App\Services\PostListService;
use JasonGrimes\Paginator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class SiteController extends Controller {

    const SUBTEMPLATE = 'main-page';

    public function actionIndex(ResponseInterface $response, $pageNumber = 1, $categoryAlias = null)
    {
        $pageData = $this->postListService->getPageDataForMainPage();
        $postList = $this->postListService->getAll($pageNumber);
        $paginator = $this->postListService->getPaginator($pageNumber);

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE,
            'pageData' => $pageData,
            'postList' => $postList,
            'paginator' => (string)$paginator
        ]);
    }

}