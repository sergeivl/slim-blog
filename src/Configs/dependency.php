<?php use function DI\get;

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


];