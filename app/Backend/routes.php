<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', function () {
        return redirect('/backend/banners');
    });
    $router->post('posts/stick', 'PostController@stick');
    $router->post('categories/sort', 'CategoryController@sort');
    $router->resources([
        'banners' => 'BannerController',
        'posts' => 'PostController',
        'pages' => 'PageController',
        'partners' => 'PartnerController',
        'categories' => 'CategoryController',
        'products' => 'ProductController',
        'messages' => 'MessageController',
    ]);
});
