<?php namespace App\Controllers;

class SiteController extends Controller {

    public function actionIndex($request, $response, $args)
    {

        $this->appSettings;
        return $this->view->render($response, 'layout.php', [
            'subtemplate' => 'mainpage',
        ]);
    }

}