<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('admin/orders/{id}', 'AdminOrderController@update');

Route::get('admin/types/search', 'AdminTypeController@search')->name('types.search');

Route::get('admin/tags/search', 'AdminTagController@search')->name('tags.search');

Route::get('admin/features/search', 'AdminFeatureController@search')->name('features.search');

Route::get('admin/users/search', 'AdminUserController@search')->name('users.search');

Route::get('admin/categories/search', 'AdminCategoryController@search')->name('category.search');

Route::get('admin/posts/search', 'AdminPostController@search')->name('posts.search');

Route::get('admin/orders/search', 'AdminOrderController@search')->name('orders.search');

Route::get('admin/codes/search', 'AdminCodeController@search')->name('codes.search');

Route::get('admin/contact/search', 'AdminContactController@search')->name('contacts.search');

Route::get('admin/blogs/search', 'PostController@search')->name('blogs.search');

Route::post('client/check_code', 'CodeController@check_code');
