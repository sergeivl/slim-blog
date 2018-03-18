<?php
/** @var \Slim\App $app */

// Главная страница сайта
$app->get('/',  'SiteController:actionIndex');
$app->get('/{pageNumber:[0-9]+}',  'SiteController:actionIndex');
