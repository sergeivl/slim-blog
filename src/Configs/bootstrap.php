<?php
require __DIR__ . '/../../vendor/autoload.php';

$app = new \App\MyApp;

/** @var \DI\Container $container */
$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager();
$capsule->addConnection([
    'driver' => $container->get('db.driver'),
    'host' => $container->get('db.host'),
    'database' => $container->get('db.database'),
    'username' => $container->get('db.username'),
    'password' => $container->get('db.password'),
    'charset' => $container->get('db.charset'),
    'collation' => $container->get('db.collation'),
    'prefix' => $container->get('db.prefix'),
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

require 'routes.php';

$app->run();
