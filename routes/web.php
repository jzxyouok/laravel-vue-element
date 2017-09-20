<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
/*前台*/
Route::get('/', 'Frontend\IndexController@index');
Route::post('/login', 'Auth\LoginController@userLogin');
Route::post('/logout', 'Auth\LoginController@userLogout');
Route::group(['namespace' => 'Frontend', 'prefix' => 'frontend'], function () {
    // 测试
    Route::get('test', 'TestController@index');
    Route::post('register/upload-face', 'RegisterController@uploadFace');
    Route::post('register/create-user', 'RegisterController@createUser');
});


/*后台*/
Route::get('/backend', 'Auth\LoginController@index');
Route::post('/backend/login', 'Auth\LoginController@adminLogin');
Route::post('/backend/logout', 'Auth\LoginController@adminLogout');
Route::group(['namespace' => 'Backend', 'prefix' => 'backend', 'middleware' => 'auth.admin'], function () {

    Route::get('/index', 'IndexController@index');
    //管理员
    Route::resource('admins', 'AdminController');
    Route::post('admin/change-status/{id}', 'AdminController@changeStatus');
    //用户
    Route::resource('users', 'UserController');
    Route::post('user/change-field-value/{id}', 'UserController@changeFieldValue');
});
