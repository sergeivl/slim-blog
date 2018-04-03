<?php namespace App\Controllers;

use App\Services\PostListService;
use Slim\Views\PhpRenderer;

abstract class Controller {

    protected $view;
    protected $postListService;

    /**
     * Controller constructor.
     * @param PhpRenderer $view
     * @param PostListService $postListService
     */
    public function __construct(PhpRenderer $view, PostListService $postListService)
    {
        $this->view = $view;
        $this->postListService = $postListService;
    }

}
