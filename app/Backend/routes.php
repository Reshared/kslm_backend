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
    $router->post('new_upload', 'ProductController@upload');
    $router->post('new_upload_file', 'ProductController@uploadFile');
    $router->post('new_delete', 'ProductController@delete');
    $router->post('products/{id}/edit/upload', 'UploadController@uploadMul');
    $router->post('products/{id}/edit/un_upload', 'UploadController@unUploadMul');
    $router->post('products/{id}/edit/upload_file', 'UploadController@uploadFiles');
    $router->post('products/{id}/edit/un_upload_file', 'UploadController@unUploadFiles');
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
