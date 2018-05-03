<?php namespace App\Controllers;

use App\Errors\NotFoundHandler;
use App\Services\CategoryListService;
use App\Services\Pages\PageDataFactory;
use App\Services\PostListService\PostListFactory;
use App\Services\TagListService;
use Slim\Views\PhpRenderer;

abstract class Controller {

    protected $view;
    protected $postListFactory;
    protected $pageDataFactory;
    protected $categoryListService;
    protected $tagListService;
    protected $notFoundHandler;

    /**
     * Controller constructor.
     * @param PhpRenderer $view
     * @param PostListFactory $postListFactory
     * @param PageDataFactory $pageDataFactory
     * @param CategoryListService $categoryListService
     * @param TagListService $tagListService
     * @param NotFoundHandler $notFoundHandler
     * @internal param PostCategoryListService $postListService
     */
    public function __construct(
        PhpRenderer $view,
        PostListFactory $postListFactory,
        PageDataFactory $pageDataFactory,
        CategoryListService $categoryListService,
        TagListService $tagListService,
        NotFoundHandler $notFoundHandler
    )
    {
        $this->view = $view;
        $this->postListFactory = $postListFactory;
        $this->pageDataFactory = $pageDataFactory;
        $this->categoryListService = $categoryListService;
        $this->tagListService = $tagListService;
        $this->notFoundHandler = $notFoundHandler;
    }

}
