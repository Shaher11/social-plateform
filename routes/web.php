<?php

use App\Code;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatFileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Message;
use App\Room;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes(['verify' => true]);

Route::get('/logout', 'Auth\LoginController@logout');


//=================== Home Top Nav ================================//

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', function () {
    $user = auth()->user();
    if ($user) {
        if ($user->role_id == 1) {
            return redirect('/admin');
        } elseif ($user->role_id == 2 || $user->role_id == 3) {
            return redirect()->route('home');
        }
    } else {
        return redirect()->route('home');
    }
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@aboutUs')->name('aboutUs');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/{post}', 'PostController@show')->name('showPost');
Route::get('/features', 'FeatureController@index')->name('features');
Route::get('/features/{feature}', 'FeatureController@show')->name('showFeature');
Route::get('/contacts', 'ContactController@index')->name('contacts');
Route::post('/contacts', 'ContactController@store')->name('contacts');


// Route::resource('/testmonial', 'ClientTestimonialController');     //***  this form will be a feedback Form ***//



Route::resource('/website', 'WebSiteController');

Route::resource('/categories', 'CategoryController');

Route::get('/test', function () {
    return view('websites.congratulation');
});




//================" Admin Dashboard Routes "=====================//

Route::group(['middleware' => 'admin'], function () {


    //Route::group(['prefix' => 'admin', 'middleware'=> ['auth', 'admin']], function(){

    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin');

    //=============" User Routes "=================================//

    Route::resource('admin/users', 'AdminUserController', ['names' => [

        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'

    ]]);

    //=========================================" Client Testmonial Routes "=========================================//

    Route::resource('admin/testmonials', 'AdminTestmonialController', ['names' => [

        'index' => 'admin.testmonials.index',
        'create' => 'admin.testmonials.create',
        'store' => 'admin.testmonials.store',
        'edit' => 'admin.testmonials.edit'

    ]]);

    //=========================================" Type Routes "=========================================//

    Route::resource('admin/types', 'AdminTypeController', ['names' => [

        'index' => 'admin.types.index',
        'create' => 'admin.types.create',
        'store' => 'admin.types.store',
        'edit' => 'admin.types.edit',
        'show' => 'admin.types.show'

    ]]);


    //=========================================" Feature Routes "=========================================//

    Route::resource('admin/features', 'AdminFeatureController', ['names' => [

        'index' => 'admin.features.index',
        'create' => 'admin.features.create',
        'store' => 'admin.features.store',
        'edit' => 'admin.features.edit',
        'show' => 'admin.features.show'

    ]]);

    //=========================================" Order Routes "=========================================//

    Route::resource('admin/orders', 'AdminOrderController', ['names' => [

        'index' => 'admin.orders.index',
        'create' => 'admin.orders.create',
        'store' => 'admin.orders.store',
        'edit' => 'admin.orders.edit',
        'show' => 'admin.orders.show'

    ]]);
    //================================== codes Routes =========================
    Route::resource('admin/codes', 'AdminCodeController', ['names' => [

        'index' => 'admin.codes.index',
        'create' => 'admin.codes.create',
        'store' => 'admin.codes.store',
        'edit' => 'admin.codes.edit',
        'show' => 'admin.codes.show'

    ]]);

    //==================================" categories "=========================================//

    Route::resource('admin/categories', 'AdminCategoryController', ['names' => [

        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'show' => 'admin.categories.show'

    ]]);

    //=========================================" Blog "=========================================//

    // Route::get('/post', 'PostController@index')->name('post')->withoutMiddleware('admin');

    // Route::get('/post/{post}', 'PostController@show')->name('showPost')->withoutMiddleware('admin');

    Route::resource('admin/posts', 'AdminPostController', ['names' => [

        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
        'show' => 'admin.posts.show',

    ]]);
    Route::patch('admin/posts/latest/{id}', 'AdminPostController@add_to_latest')->name('admin.posts.latest');

    //=========================================" Tags "=========================================//

    Route::resource('admin/tags', 'AdminTagController', ['names' => [

        'index' => 'admin.tags.index',
        'create' => 'admin.tags.create',
        'store' => 'admin.tags.store',
        'edit' => 'admin.tags.edit'
    ]]);

    //=========================================" Quotes "=========================================//

    Route::resource('admin/quotes', 'AdminQuoteController', ['names' => [

        'index' => 'admin.quotes.index',
        'create' => 'admin.quotes.create',
        'store' => 'admin.quotes.store',
        'edit' => 'admin.quotes.edit'
    ]]);

    //=========================================" Comment Routes "=========================================//

    Route::resource('admin/comments', 'PostCommentsController', ['names' => [

        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit'  => 'admin.comments.edit',
        'show'  => 'admin.comments.show',

    ]]);

    // Route::resource('admin/comments', 'PostCommentsController');

    Route::resource('admin/comments/replies', 'CommentRepliesController');

    Route::post('comments', 'PostCommentsController@createUnloggedUserComment');

    Route::group(['middleware' => 'auth'], function () {

        Route::post('comment/reply', 'CommentRepliesController@createReply');
    });

    //=========================================" End Blog Routes "======================================//


    Route::resource('admin/contacts', 'AdminContactController', ['names' => [

        'index' => 'admin.contacts.index',
        'create' => 'admin.contacts.create',
        'store' => 'admin.contacts.store',
        'edit' => 'admin.contacts.edit',
        'show' => 'admin.contacts.show'
    ]]);


    // Route::resource('admin/media', 'AdminMediasController',['names'=>[

    //     'index'=>'admin.media.index',
    //     'create'=>'admin.media.create',
    //     'store'=>'admin.media.store',
    //     'edit'=>'admin.media.edit'

    // ]]);

    // Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');



    //
    //     Route::resource('admin/comment/replies', 'CommentRepliesController',['names'=>[
    //
    //
    //         'index'=>'admin.replies.index',
    //         'create'=>'admin.replies.create',
    //         'store'=>'admin.replies.store',
    //         'edit'=>'admin.replies.edit'
    //
    //     ]]);


    //    Route::middleware('role:Admin')->group(function(){
    //
    //        Route::get('');
    //    });


});


Route::group(['middleware' => ['auth', 'client-developer']], function () {


    //====================== User Dashboard ======================
    Route::get('dashboard', [UserController::class, 'index'])->name('users.dashboard');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

    //===================== Orders ===============================
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('orders/confirmPayment/{order}', [OrderController::class, 'confirmPayment'])->name('orders.confirm');
    //============================================
});

Route::get('auth/social', [LoginController::class, 'show'])->name('social.login');
Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');



Route::post('comments', 'PostCommentsController@createUnloggedUserComment');

Route::group(['middleware' => 'auth'], function () {
    //====================== Chat ================================
    Route::get('chat', [ChatController::class, 'index'])->name('chat');
    Route::get('rooms/{order}', [MessageController::class, 'show'])->name('rooms.show');
    Route::get('rooms', [MessageController::class, 'index']);
    Route::get('rooms/{room}/messages', [MessageController::class, 'fetch_messages']);
    Route::post('rooms/{room}/messages', [MessageController::class, 'send_message']);
    Route::get('rooms/{room}/developer', [MessageController::class, 'getDeveloper']);
    Route::get(('rooms/{room}/files'), [ChatFileController::class, 'index']);
    Route::post(('rooms/{room}/files'), [ChatFileController::class, 'store']);

    Route::post('messages/{room}/read', [MessageController::class, 'message_read']);

    //========================= Comments =========================
    Route::post('comment/reply', 'CommentRepliesController@createReply');
});

//================== Paypal ==============================
Route::post('pay', 'PaymentController@payWithpaypal')->name('pay');
Route::get('status/{order}', 'PaymentController@status')->name('status');
Route::get('canceled', 'PaymentController@canceled')->name('canceled');
//================== HyperPay ============================
Route::get('get-checkout/{cost}', [PaymentController::class, 'hyperpayCheckout'])->name('hyperpay');
Route::get('payed', [OrderController::class, 'payedOrNot'])->name('payed-success');
