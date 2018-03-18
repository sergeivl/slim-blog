<?php

use App\Services\ControllerNameService;
use Illuminate\Database\Capsule\Manager;
use Slim\Views\PhpRenderer;

$container = $app->getContainer();
$container['view'] = function (\Slim\Container $c) {
    return new PhpRenderer($c['settings']['templatesPath'] . '/' . $c['settings']['theme']);
};

$capsule = new Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($c) use ($capsule) {
    return $capsule;
};

$controllerName = (new ControllerNameService)->getName($_SERVER['REQUEST_URI']);

$container = $app->getContainer();
$container[$controllerName] = function ($c) use ($controllerName) {
    /** @var \Slim\Container $c */
    /** @var PhpRenderer $view */
    $view = $c->get('view');
    /** @var Manager $db */
    $db = $c->get('db');
    $templateSettings = $c['settings'];

    $templateSettings = [];
    $controllerClass = ControllerNameService::NAMESPACE_OF_CONTROLLERS . '\\' . $controllerName;
    return new $controllerClass($view, $db, $templateSettings);
};