<?php

use App\Controllers\CategoryController;
use App\Controllers\PageController;
use App\Controllers\PostController;
use App\Controllers\SiteController;
use App\Controllers\TagController;
use App\Controllers\ErrorController;
use App\Controllers\UserController;


$app->get('/', [SiteController::class, 'actionIndex'])->add(\App\Middleware\AuthMiddleware::class);
$app->get('/{pageNumber:[0-9]+}', [SiteController::class, 'actionIndex']);


$app->get('/user/login', [UserController::class, 'actionView']);
$app->post('/user/login', [UserController::class, 'actionLogin']);

$app->get('/{alias}.html', [PostController::class, 'actionView']);

$app->get('/{alias}', [CategoryController::class, 'actionIndex']);
$app->get('/{alias}/{pageNumber:[0-9]+}', [CategoryController::class, 'actionIndex']);

$app->get('/tag/{alias}', [TagController::class, 'actionIndex']);
$app->get('/tag/{alias}/{pageNumber:[0-9]+}', [TagController::class, 'actionIndex']);

$app->get('/page/{alias}', [PageController::class, 'actionView']);

$app->get('/error/not-found', [ErrorController::class, 'actionNotFound']);


