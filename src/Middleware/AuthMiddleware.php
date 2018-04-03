<?php namespace App\Middleware;

use App\Services\AuthService;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthMiddleware
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function __invoke(Request $request, Response $response, $next)
    {
        // TODO: сделать проверку авторизации
        return  $next($request, $response);
    }
}