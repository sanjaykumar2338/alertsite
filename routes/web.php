<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Subscriptions\PaymentController;
use App\Http\Controllers\Subscriptions\StripeWebhookController;
use App\Http\Controllers\Subscriptions\SubscriptionController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'admin','middleware' => 'check.auth'], function () {
    Route::get('', [AdminController::class, 'index']);
    //Route::get('/',[ProductsController::class, 'product_show']);
    //Route::get('/show/{product}',[ProductsController::class,'product_view']);
    Route::get('products/create_template/{id}', [ProductsController::class, 'create_template']);
    Route::resource('/products', ProductsController::class);
    Route::post('/products', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::post('/products/update/{id}', [ProductsController::class, 'update']);
    Route::get('/products/remove/{id}', [ProductsController::class, 'destroy']);
    Route::get('products/{product}', 'ProductsController@show');
    Route::get('photos/create/{id}', 'PhotoController@create');
    Route::get('/order', [AdminController::class, 'order']);
    Route::get('/customer', [AdminController::class, 'customer']);
    Route::post('/cancel-subscription/{id}', [AdminController::class, 'cancelSubscription'])->name('cancel.subscription');

    //blogs
    Route::get('blogs', [BlogsController::class, 'index']);
    Route::post('/blogs', [BlogsController::class, 'store'])->name('admin.blogs.store');
    Route::post('/blogs/update/{id}', [BlogsController::class, 'update']);
    Route::get('/blogs/remove/{id}', [BlogsController::class, 'destroy']);
    Route::get('/blogs/edit/{id}', [BlogsController::class, 'edit']);
    Route::get('blogs/{product}', [BlogsController::class, 'show']);
    Route::get('blogs/add/new', [BlogsController::class, 'create']);
    Route::get('blogs/moderate/{id}', [BlogsController::class, 'moderate']);
    Route::get('blogs/moderate/changestatus/{id}/{status}', [BlogsController::class, 'changestatus']);

    //pages
    Route::get('pages', [PagesController::class, 'index']);
    Route::post('/pages', [PagesController::class, 'store'])->name('admin.pages.store');
    Route::post('/pages/update/{id}', [PagesController::class, 'update']);
    Route::get('/pages/remove/{id}', [PagesController::class, 'destroy']);
    Route::get('/pages/edit/{id}', [PagesController::class, 'edit']);
    Route::get('pages/{product}', [PagesController::class, 'show']);
    Route::get('pages/add/new', [PagesController::class, 'create']);
    Route::get('pages/moderate/{id}', [PagesController::class, 'moderate']);
    Route::get('pages/moderate/changestatus/{id}/{status}', [PagesController::class, 'changestatus']);
});

Route::group(['middleware' => 'check.auth'], function () {
    Route::get('/my_account', [App\Http\Controllers\HomeController::class, 'my_account'])->name('my_account');
    Route::get('/track/list', [App\Http\Controllers\TrackController::class, 'track_list'])->name('track.list');
    Route::get('/track/add', [App\Http\Controllers\TrackController::class, 'add'])->middleware('check.track.limit')->name('track.add');
    Route::post('/track/save', [App\Http\Controllers\TrackController::class, 'save'])->name('track.save');
    Route::get('/track/remove/{id}', [App\Http\Controllers\TrackController::class, 'destroy'])->name('track.destroy');
    Route::get('/track/edit/{id}', [App\Http\Controllers\TrackController::class, 'edit'])->name('track.edit');
    Route::post('/track/update/{id}', [App\Http\Controllers\TrackController::class, 'update'])->middleware('check.track.update.limit')->name('track.update');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/save_review', [App\Http\Controllers\HomeController::class, 'save_review'])->name('save_review');
Route::get('/get_images', [App\Http\Controllers\HomeController::class, 'get_images'])->name('get_images');
Route::get('/updateImageNames', [App\Http\Controllers\HomeController::class, 'updateImageNames'])->name('updateImageNames');
Route::get('/updateEmptyImageColumns', [App\Http\Controllers\HomeController::class, 'updateEmptyImageColumns'])->name('updateEmptyImageColumns');

Route::get('/pricing', [App\Http\Controllers\HomeController::class, 'pricing'])->name('pricing');
Route::get('/contactus', [App\Http\Controllers\HomeController::class, 'contactus'])->name('contactus');
Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/track', [App\Http\Controllers\HomeController::class, 'track'])->middleware('auth')->name('track');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/terms-and-conditions', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy_policy'])->name('privacy_policy');

Route::get('/shop2', [App\Http\Controllers\HomeController::class, 'shop2'])->name('shop2');
Route::get('/media', [App\Http\Controllers\HomeController::class, 'media'])->name('media');
Route::get('/justice', [App\Http\Controllers\HomeController::class, 'justice'])->name('justice');
Route::get('/blogs', [App\Http\Controllers\HomeController::class, 'blog'])->name('blogs');
Route::get('/blog/{slug}', [App\Http\Controllers\HomeController::class, 'blog_detail'])->name('blog_detail');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/events', [App\Http\Controllers\HomeController::class, 'events'])->name('events');
Route::get('/track_order', [App\Http\Controllers\HomeController::class, 'track_order'])->name('track_order');
Route::get('/shipping', [App\Http\Controllers\HomeController::class, 'shipping'])->name('shipping');
Route::get('/wishlist', [App\Http\Controllers\HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/order_history', [App\Http\Controllers\HomeController::class, 'order_history'])->name('order_history');
Route::get('/return_order', [App\Http\Controllers\HomeController::class, 'return_order'])->name('return_order');
Route::get('/donate_now', [App\Http\Controllers\HomeController::class, 'donate_now'])->name('donate_now');
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register.form');
Route::get('/product_design', [App\Http\Controllers\HomeController::class, 'product_design'])->name('product_design');
Route::get('/create_product', [App\Http\Controllers\HomeController::class, 'create_product'])->name('create_product');

Route::get('/product/list/{standwith}/{productfor}/{producttype}', [App\Http\Controllers\HomeController::class, 'product_list']);
Route::get('/product/category/{category}', [App\Http\Controllers\HomeController::class, 'product_category']);
Route::get('/{standwithtype}/shop/{productType}/{slug}', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::get('/country/product/{category}', [App\Http\Controllers\HomeController::class, 'country_product'])->name('country_product');

Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/product_slug', [App\Http\Controllers\UserController::class, 'product_slug'])->name('product_slug');
Route::post('/storeOrder', [App\Http\Controllers\UserController::class, 'storeOrder']);

Route::post(
    'stripe/webhook',
    [WebhookController::class, 'handleWebhook']
);

Route::post('/charge', [App\Http\Controllers\PaymentController::class, 'processPayment'])->name('charge');
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('plans', [SubscriptionController::class, 'index'])->name('plans');
Route::get('/plan/{id}', [App\Http\Controllers\HomeController::class, 'plandetails'])->middleware('auth')->name('plan.detail');
Route::get('/subscribe', 'SubscriptionController@showSubscription');
Route::post('/subscribe', [PaymentController::class, 'store'])->name('subscribe.form');
Route::get('/subscription-cancel', [PaymentController::class, 'subscriptionCancel'])->name('subscription-cancel');

// welcome page only for subscribed users
Route::get('/welcome', 'SubscriptionController@showWelcome')->middleware('subscribed');
Route::group(['middleware' => ['role:seller']], function () {
  Route::get('/welcome', 'SubscriptionController@showWelcome');
});

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook'])->name('cashier.webhook');
Route::any('/email-send', [TrackController::class, 'sendEmailToUsersWithTracks']);
Route::any('/sms-send', [TrackController::class, 'sendSMSToUsers']);
Route::any('/get-store-price', [TrackController::class, 'getallstore']);
Route::any('/get-store-name', [TrackController::class, 'getstorewithname']);