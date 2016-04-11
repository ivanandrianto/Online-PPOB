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

Route::group(['middleware' => ['web']], function () {

    /* AUTHENTICATION ROUTES */
	/* Login Routes Admin */
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@logout');

    /* Registration Routes Admin */
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::get('/admin', 'AdminController@index');

    /* Login Routes Merchant */
    Route::get('/merchant/login','MerchantAuth\AuthController@showLoginForm');
    Route::post('/merchant/login','MerchantAuth\AuthController@login');
    Route::get('/merchant/logout','MerchantAuth\AuthController@logout');

    /* Registration Routes Merchant */
    Route::get('merchant/register', 'MerchantAuth\AuthController@showRegistrationForm');
    Route::post('merchant/register', 'MerchantAuth\AuthController@register');

    //Route::get('/merchant', 'MerchantController@index');

    /* END OF AUTHENTICATION ROUTES */

    Route::get('/', function () {
        return view('welcome');
    });

    /* DASHBOARD */
    /* Dashboard - Merchant */
    Route::get('merchant/dashbaord', 'MerchantController@showDashboard');

    /* MERCHANT */
    /* Merchant - Admin */
    Route::get('/admin/merchant', function () {
        return view('admin.merchant.index');
    });
    Route::get('/api/v1/merchant/getAll/', 'MerchantController@getAllMerchant');
    Route::get('/api/v1/merchant/get/{id}', 'MerchantController@getMerchant');
    Route::post('/api/v1/merchant/edit/{id}', 'MerchantController@editMerchant');
    Route::delete('/api/v1/merchant/delete/{id}', 'MerchantController@deleteMerchant');

    /* Merchant - Public */
    Route::get('/merchant', 'MerchantController@getView');
    /*Route::get('/merchant/register', function () {
        return view('merchant.index');
    });
    Route::post('/merchant/register', 'MerchantController@addMerchant');*/
    /* END OF MERCHANT */

    /* JENISITEM */
    /* JenisItem - Admin */
    Route::get('/admin/jenis-item', 'JenisItemController@getView');
    Route::get('/api/v1/jenisitem/getAll/', 'JenisItemController@getAllJenisItem');
    Route::get('/api/v1/jenisitem/get/{id}', 'JenisItemController@getJenisItem');
    Route::post('/api/v1/jenisitem/add', 'JenisItemController@addJenisItem');
    Route::post('/api/v1/jenisitem/edit/{id}', 'JenisItemController@editJenisItem');
    Route::delete('/api/v1/jenisitem/delete/{id}', 'JenisItemController@destroy');

    /* ITEM */
    /* Item - Admin */
    Route::get('/admin/items', 'ItemsController@getView');
    Route::get('/api/v1/item/getAll/', 'ItemsController@getAllItems');
    Route::get('/api/v1/item/get/{id}', 'ItemsController@getItem');
    Route::post('/api/v1/item/add', 'ItemsController@addItem');
    Route::post('/api/v1/item/edit/{id}', 'ItemsController@editItem');
    Route::delete('/api/v1/item/delete/{id}', 'ItemsController@destroy');

    /* Item - Merchant/Admin */
    Route::get('/api/v1/item/getAllJenis/', 'ItemsController@getAllJenisItem');

    /* PERMOHONAN */
    /* Permohonan - Admin */
    Route::get('admin/permohonan', 'PermohonanController@getView');
    Route::get('/api/v1/permohonan/getAll/{status?}', 'PermohonanController@getAllPermohonan');
    Route::get('/api/v1/permohonan/get/{id}', 'PermohonanController@getPermohonan');
    Route::post('/api/v1/permohonan/approveReject/{type}/{id}', 'PermohonanController@approveRejectPermohonan');


    /* TRANSAKSI */
    /* Transaksi - Merchant */
    Route::get('merchant/transaksi', 'TransaksiController@getView');
    Route::get('merchant/transaksi/jenis/{id}', 'TransaksiController@selectJenis');
    Route::get('merchant/transaksi/item/{id}', 'TransaksiController@selectItem');
    Route::post('merchant/transaksi/do', 'TransaksiController@performTransaction');
    Route::get('merchant/transaksi/history/{date?}', 'TransaksiController@getMyTransactions');
});
