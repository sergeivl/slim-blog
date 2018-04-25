<?php

namespace Errors;


use Slim\Handlers\NotFound;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\PhpRenderer;

class NotFoundHandler extends NotFound
{
    private $view;
    private $templateFile;

    const SUBTEMPLATE = '404';

    public function __construct(PhpRenderer $view) {
        $this->view = $view;
        $this->templateFile = '';
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) {
        parent::__invoke($request, $response);

        $pageData = [
            'title' => 'Ошибка 404',
            'title_seo' => 'Ошибка 404',
            'meta_d' => '',
            'meta_k' => ''
        ];

        //$categoryList = $this->categoryListService->getAllCategories();
        //$tagList = $this->tagListService->getAllTags();

        $categoryList = [];
        $tagList = [];

        $response->withStatus('404');

        return $this->view->render($response, 'layout.php', [
            'subtemplate' => self::SUBTEMPLATE,
            'pageData' => $pageData,
            'categoryList' => $categoryList,
            'tagList' => $tagList
        ]);

        return $response->withStatus(404);
    }
}