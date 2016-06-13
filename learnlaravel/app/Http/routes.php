<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//zzj添加的内容
/*Route::get('/',function(){
    return view('welcome');
//   return 'hello world';
//    return view('sites.about');//为了方便理解放到下面

});
Route::get('/about',function(){
//   return 'My name is zzj';
    return view('sites.about');
});
*/
/*以上是为每一个路由写一个命名函数很不明智，所以改为以下方式*/

//前台
Route::get('/','SitesController@index');//laravelzzj
/*Route::get('/about','SitesController@about');//about页面
Route::get('contact','SitesController@contact');//contact页面*/
/*
Route::get('/articles','ArticlesController@index'); //文章首页
Route::get('/articles/create','ArticlesController@create');//创建文章
Route::post('/articles','ArticlesController@store');//显示
Route::get('/articles/{id}','ArticlesController@show');//显示文章详情
Route::get('/articles/{id}/edit','ArticlesController@edit');//修改文章内容
*/
Route::resource('articles','ArticlesController');//文章的增删改查

Route::get('auth/login', 'Auth\AuthController@getLogin');//登录
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/register', 'Auth\AuthController@getRegister');//注册
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/logout', 'Auth\AuthController@getLogout');//退出


// 后台管理
Route::get('admin', function () {
    return redirect('/admin/post');
});
$router->group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('admin/user', 'UserController',['except' => 'show']);
    Route::resource('admin/post', 'PostController',['except' => 'show']);
    Route::resource('admin/tag', 'TagController',['except' => 'show']);
    Route::get('admin/upload', 'UploadController@index');

    Route::post('admin/upload/file', 'UploadController@uploadFile');
    Route::delete('admin/upload/file', 'UploadController@deleteFile');
    Route::post('admin/upload/folder', 'UploadController@createFolder');
    Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
});
// Logging in and out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
