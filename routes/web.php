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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/vouchers','VoucherController@index');

/**
 * resource() method of Route allows you to expose multiple routes i.e.
 * multiple actions on the specified resource.
 * 
 * Mapping is as follows:
 * GET/vouchers, mapped to the index() method,
 * GET/vouchers/create, mapped to the create() method,
 * POST/vouchers, mapped to the store() method,
 * GET/vouchers/{voucher}, mapped to the show() method,
 * GET/vouchers/{voucher}/edit, mapped to the edit() method,
 * PUT/PATCH/vouchers/{voucher}, mapped to the update() method,
 * DELETE/vouchers/{voucher}, mapped to the destroy() method.
 */
// Route::resource('vouchers','VoucherController');

/**
 * apiResource() is used when you only want to expose a RESTful API
 * and exclude routes that are used to serve the HTML templates.
 */
// Route::apiResource('vouchers','VoucherController');