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
    $router->post('upload', 'UploadController@uploadImg');
    $router->post('ck_upload', 'UploadController@uploadCk');
    $router->post('posts/stick', 'PostController@stick');
    $router->post('messages/deal', 'MessageController@deal');
    $router->post('categories/sort', 'CategoryController@sort');
    $router->resources([
        'banners' => 'BannerController',
        'honors' => 'HonorController',
        'posts' => 'PostController',
        'pages' => 'PageController',
        'partners' => 'PartnerController',
        'major_categories' => 'MajorCategoryController',
        'categories' => 'CategoryController',
        'products' => 'ProductController',
        'messages' => 'MessageController',
    ]);
});
