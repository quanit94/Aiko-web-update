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

Route::get('/', function(){
    return redirect()->route('get.auth.auth.login');
});
/*======================= Authentication ===================================================================================*/
Route::controller('auth', 'Auth\AuthController', [
    'getLogin'          => 'get.auth.auth.login',
    'postLogin'         => 'post.auth.auth.login',
    'postLogout'        => 'post.auth.auth.logout',
    'getForgetPassword' => 'get.auth.auth.forgetPassword',
    'postForgetPassword'=> 'post.auth.auth.forgetPassword',
]);
/*====================== End Authentication =======================================================================*/

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'), function(){

    /*====================== HomeController ===================================================================================*/
    Route::controller('home', 'HomeController', [
        'getDashboard01' => 'get.admin.home.dashboard_01',
        'getDashboard02' => 'get.admin.home.dashboard_02',
    ]);
    /*====================== End HomeController =======================================================================*/

    /*====================== UserController ========================================================================*/
    Route::controller('user', 'UserController', [
        'getList'       => 'get.admin.user.list',

        'getCreate'     => 'get.admin.user.create',
        'postCreate'    => 'post.admin.user.create',

        'getUpdate'     => 'get.admin.user.update',
        'postUpdate'    => 'post.admin.user.update',

        'getRemove'     => 'get.admin.user.remove',
        'postRemove'    => 'post.admin.user.remove',

        'getActivate'   => 'get.admin.user.activate',
        'postActivate'  => 'post.admin.user.activate',

        'getDeactivate' => 'get.admin.user.deactivate',
        'postDeactivate'=> 'post.admin.user.deactivate',
    ]);

    Route::controller('search', 'SearchController', [
        'getList'      =>  'get.admin.search.list',
        'getActivate'      =>  'get.admin.search.activate',
        'getDeactivate'      =>  'get.admin.search.deactivate',
    ]);
    /*====================== End UserController ========================================================================*/
});

Route::group(array('prefix' => 'partner', 'namespace' => 'Partner', 'middleware' => 'partner'), function(){
    Route::controller('home', 'HomeController', [
        'getDashboard01' => 'get.partner.home.dashboard_01',
    ]);

    Route::controller('restaurant', 'RestaurantController', [
        'getList'       => 'get.partner.restaurant.list',

        'getCreate'     => 'get.partner.restaurant.create',
        'postCreate'    => 'post.partner.restaurant.create',

        'getUpdate'     => 'get.partner.restaurant.update',
        'postUpdate'    => 'post.partner.restaurant.update',

        'getRemove'     => 'get.partner.restaurant.remove',
        'postRemove'    => 'post.partner.restaurant.remove',
    ]);

    Route::controller('promotion', 'PromotionController', [
        'getList'       => 'get.partner.promotion.list',
        'getGet'        =>  'get.partner.promotion.get',

        'getCreate'     =>  'get.partner.promotion.create',
        'postCreate'     =>  'post.partner.promotion.create',

        'getUpdate'     => 'get.partner.promotion.update',
        'postUpdate'    => 'post.partner.promotion.update',

        'getRemove'     => 'get.partner.promotion.remove',
        'postRemove'    => 'post.partner.promotion.remove',
    ]);
});


