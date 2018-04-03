<?php
$main = [
    'settings.displayErrorDetails' => true, // set to false in production
    'settings.httpVersion' => '1.1',
    'settings.responseChunkSize' => 4096,
    'settings.outputBuffering' => 'append',
    'settings.addContentLengthHeader' => true,
    'settings.routerCacheFile' => false,
    'settings.determineRouteBeforeAppMiddleware' => false,
];

$db = require 'db.php';
$web = require 'web.php';
$auth = require 'auth.php';

$dependency = require 'dependency.php';

return array_merge($main, $db, $web, $auth, $dependency);