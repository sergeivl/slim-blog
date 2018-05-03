<?php

namespace App\Errors;


use App\Services\CategoryListService;
use App\Services\TagListService;
use Slim\Handlers\NotFound;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class NotFoundHandler extends NotFound
{
    private $view;
    private $templateFile;
    private $categoryListService;
    private $tagListService;

    const SUBTEMPLATE = '404';

    public function __construct(PhpRenderer $view,
                                CategoryListService $categoryListService,
                                TagListService $tagListService) {
        $this->view = $view;
        $this->templateFile = '';
        $this->categoryListService = $categoryListService;
        $this->tagListService = $tagListService;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) {
        parent::__invoke($request, $response);

        $pageData = [
            'title' => 'Ошибка 404',
            'title_seo' => 'Ошибка 404',
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
        ])->withStatus(404);
    }
}