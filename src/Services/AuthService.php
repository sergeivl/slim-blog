<?php namespace App\Services;

use Slim\Container;

class AuthService
{
    const LOGIN = 'admin';
    const PASSWORD = 'trunc';

    private $login;
    private $password;

    /**
     * Auth constructor.
     * @param null $login
     * @param null $password
     * @internal param Container $container
     */
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        session_start();

    }

    public function attempt($login, $password)
    {
        if ($login === $this->login && $password === $this->password) {
            $_SESSION['user'] =  $this->login;
            return true;
        }

        return false;
    }

    public function check()
    {
        return isset($_SESSION['user']) && ($_SESSION['user'] === $this->login);
    }
}
