<?php namespace App\Services;

class ControllerNameService
{
    const DEFAULT_CONTROLLER = 'SiteController';
    const NAMESPACE_OF_CONTROLLERS = '\App\Controllers';

    public function getName($uri)
    {
        if ($uri !== '/') {
            echo $uri;
            die('как так');
            $controllerName = $this->parseNameFromUri($uri);
        } else {
            $controllerName = self::DEFAULT_CONTROLLER;
        }

        if (!$this->issetController($controllerName)) {
            throw new \Exception('Страница не найдена', 404);
        }

        return $controllerName;
    }

    private function parseNameFromUri($uri)
    {
        if($partsOfUri = explode('/', $uri)){
            $controllerName = $partsOfUri[1];
        } else {
            $controllerName = $uri;
        }
        return $controllerName;
    }

    private function issetController($controllerName)
    {
        return class_exists(self::NAMESPACE_OF_CONTROLLERS . '\\' . $controllerName);
    }



}