<?php

use Illuminate\Support\Facades\Route;

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


    Route::group(['prefix' => 'itel'],function (){
        Route::crud('itel-product', 'ItelProductCrudController');

        Route::get('itel-sales', ['as' => 'admin.itel.show-daily-clossing', 'uses' => 'ItelController@itelSale']); 
        Route::post('itel-sales-save', ['as' => 'admin.itel.saved-daily-clossing', 'uses' => 'ItelController@itelSaleSave']); 
        // Route::get('gp-report', ['as' => 'admin.gp.show-gp-report', 'uses' => 'GpProductController@GpSalesReport']); 

    });

}); // this should be the absolute last line of this file