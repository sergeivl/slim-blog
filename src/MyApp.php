<?php namespace App;
use DI\Bridge\Slim\App;
use DI\ContainerBuilder;


class MyApp extends App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $builder->addDefinitions(__DIR__ . '/Configs/main.php');
    }
}