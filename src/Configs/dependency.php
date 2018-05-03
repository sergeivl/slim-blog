<?php use function DI\get;
use Psr\Container\ContainerInterface;

return [
    \Slim\Views\PhpRenderer::class => DI\autowire()
        ->constructor(
            '../src/Views/standard/',
            [
                'textLogo' => get('web.textLogo'),
            ]
        ),

    \App\Services\PaginationService::class => DI\autowire()
        ->constructor(0, get('web.postPerPage'), 1),

    \App\Services\AuthService::class => DI\autowire()
        ->constructor(get('auth.login'), get('auth.password')),

    'notFoundHandler' => function (ContainerInterface $c) {

        return new \App\Errors\NotFoundHandler
        (
            $c->get(\Slim\Views\PhpRenderer::class),
            $c->get(\App\Services\CategoryListService::class),
            $c->get(\App\Services\TagListService::class)
        );
    },

];