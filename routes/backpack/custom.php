<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Http\Controllers\admin\ItelDailyUpfrontCrudController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes


    // Dashboard
    Route::get('dashboards', ['as' => 'admin.dashboard', 'uses' => 'dashboardController@viewDash']);




    // Itel

    Route::group(['prefix' => 'itel'], function () {
        Route::crud('itel-daily-upfront', 'ItelDailyUpfrontCrudController');

        Route::crud('itel-product', 'ItelProductCrudController');
        Route::crud('itel-daily-sale', 'ItelDailySaleCrudController');
        Route::get('itel-sales', ['as' => 'admin.itel.show-daily-clossing', 'uses' => 'ItelController@itelSale']);
        Route::post('itel-sales-save', ['as' => 'admin.itel.saved-daily-clossing', 'uses' => 'ItelController@itelSaleSave']);

        Route::crud('itel-expense', 'ItelExpenseCrudController');
    });

    Route::group(['prefix' => 'itel_expense'], function () {
        Route::crud('itel-expense', 'ItelExpenseCrudController');
    });

    // Grameenphone

    Route::group(['prefix' => 'grameenphone'], function () {
        Route::crud('grammenphone-product', 'GrammenphoneProductCrudController');
        Route::crud('gp-daily-sale', 'GpDailySaleCrudController');
        Route::crud('grammenphone-daily-upfront', 'GrammenphoneDailyUpfrontCrudController');

        Route::get('grameenphone-sales', ['as' => 'admin.grameenphone.show-daily-clossing', 'uses' => 'GrameenphoneController@grameenphoneSale']);
        Route::post('grameenphone-sales-save', ['as' => 'admin.grameenphone.saved-daily-clossing', 'uses' => 'GrameenphoneController@grameenphoneSaleSave']);

        Route::crud('gp-expense', 'GpExpenseCrudController');
    });

    Route::group(['prefix' => 'gp_expense'], function () {

        Route::crud('gp-expense', 'GpExpenseCrudController');
    });

    // dropshipping //


    Route::group(['prefix' => 'aws_drop'], function () {
        Route::crud('amazon-order', 'AmazonOrderCrudController');
        Route::crud('amazon-poroduct', 'AmazonPoroductCrudController');
        Route::crud('aamazon-bproduct', 'AamazonBproductCrudController');
        Route::crud('amazon-extra-expense', 'AmazonExtraExpenseCrudController');
    });

    Route::get('amazon-orders', ['as' => 'admin.amazon-order', 'uses' => 'OrderMailController@mailOrder']);


    Route::crud('polar', 'PolarCrudController');
    Route::get('polar-sms', ['as' => 'admin.polar.sms', 'uses' => 'PolarController@getSmsList']);
    Route::post('polar-sms-user', ['as' => 'admin.polar.user', 'uses' => 'PolarController@getSmsListUser']);
    Route::post('polar-sms-sent', ['as' => 'admin.polar.sms.sent', 'uses' => 'PolarController@smsSent']);
}); // this should be the absolute last line of this file
