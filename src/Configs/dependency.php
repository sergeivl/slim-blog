<?php use function DI\get;
use Psr\Container\ContainerInterface;

return [
    \Slim\Views\PhpRenderer::class => DI\autowire()
        ->constructor(
            '../src/Views/standart/',
            [
                'textLogo' => get('web.textLogo'),
            ]
        ),

    \App\Services\PaginationService::class => DI\autowire()
        ->constructor(0, get('web.postPerPage'), 1),

    \App\Services\AuthService::class => DI\autowire()
        ->constructor(get('auth.login'), get('auth.password')),

    \Slim\Handlers\NotFound::class => function (ContainerInterface $c) {

        return new Errors\NotFoundHandler
        (
            $c->get(\Slim\Views\PhpRenderer::class)
        );
    },

];