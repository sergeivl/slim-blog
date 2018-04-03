<?php
use App\Controllers\SiteController;


$app->get('/', [SiteController::class, 'actionIndex'])->add(\App\Middleware\AuthMiddleware::class);
$app->get('/{pageNumber:[0-9]+}', [SiteController::class, 'actionIndex']);
$app->get('/{categoryAlias}', [SiteController::class, 'actionIndex']);
$app->get('/{categoryAlias}/{pageNumber:[0-9]+}', [SiteController::class, 'actionIndex']);