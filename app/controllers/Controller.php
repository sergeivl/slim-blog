<?php namespace App\Controllers;

use Illuminate\Database\Capsule\Manager;
use Slim\Views\PhpRenderer;

abstract class Controller {

    protected $db;
    protected $view;
    protected $appSettings;

    /**
     * Controller constructor.
     * @param Manager $db
     * @param PhpRenderer $view
     * @param array $templateSettings
     */
    public function __construct(PhpRenderer $view, Manager $db, array $templateSettings = [])
    {
        $this->db = $db;
        $this->view = $view;
        $this->appSettings = $templateSettings;
    }

}
