<?php

use App\Controllers\Admin\AdminPanelController;
use App\Controllers\Admin\AdminCategoryController;
use App\Controllers\Admin\AdminPostController;
use App\Controllers\CategoryController;
use App\Controllers\PageController;
use App\Controllers\PostController;
use App\Controllers\SiteController;
use App\Controllers\TagController;
use App\Controllers\UserController;

$app->get('/', [SiteController::class, 'actionIndex']);
$app->get('/{pageNumber:[0-9]+}', [SiteController::class, 'actionIndex']);


$app->get('/user/login', [UserController::class, 'actionView']);
$app->post('/user/login', [UserController::class, 'actionLogin']);

$app->get('/{alias}.html', [PostController::class, 'actionView']);

$app->get('/{alias}', [CategoryController::class, 'actionIndex']);
$app->get('/{alias}/{pageNumber:[0-9]+}', [CategoryController::class, 'actionIndex']);

$app->get('/tag/{alias}', [TagController::class, 'actionIndex']);
$app->get('/tag/{alias}/{pageNumber:[0-9]+}', [TagController::class, 'actionIndex']);

$app->get('/page/{alias}', [PageController::class, 'actionView']);


// Admin Routes

$app->get('/admin/panel', [AdminPanelController::class, 'actionView'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/category', [AdminCategoryController::class, 'actionIndex'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/category/create', [AdminCategoryController::class, 'actionCreate'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/category/update/{id:[0-9]+}', [AdminCategoryController::class, 'actionDelete'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/category/delete/{id:[0-9]+}', [AdminCategoryController::class, 'actionUpdate'])
    ->add(\App\Middleware\AuthMiddleware::class);


$app->get('/admin/post', [AdminPostController::class, 'actionIndex'])
    ->add(\App\Middleware\AuthMiddleware::class);
$app->get('/admin/post/{pageNumber:[0-9]+}', [AdminPostController::class, 'actionIndex'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/post/create', [AdminPostController::class, 'actionCreate'])
    ->add(\App\Middleware\AuthMiddleware::class);
$app->post('/admin/post/create', [AdminPostController::class, 'actionCreate'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/post/update/{id:[0-9]+}', [AdminPostController::class, 'actionUpdate'])
    ->add(\App\Middleware\AuthMiddleware::class);
$app->post('/admin/post/update/{id:[0-9]+}', [AdminPostController::class, 'actionUpdate'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/post/delete/{id:[0-9]+}', [AdminPostController::class, 'actionDelete'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/post/save', [AdminPostController::class, 'actionSave'])
    ->add(\App\Middleware\AuthMiddleware::class);

$app->get('/admin/post/save/{id:[0-9]+}', [AdminPostController::class, 'actionUpdate'])
    ->add(\App\Middleware\AuthMiddleware::class);

