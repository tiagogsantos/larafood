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

Route::prefix('admin')->namespace('Admin')->group(function () {

    /*
     * Rotas dos detalhes
     */

    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

    /*
     * Rotas de Filtro de Plano
     */
    Route::any('plans/search', 'PlanController@search')->name('plans.search');

    /*
     * Rotas de Planos
     */
    Route::delete('plans/{id}', 'PlanController@destroy')->name('plans.destroy');
    Route::put('plans/update/{id}', 'PlanController@update')->name('plans.update');
    Route::get('plans/edit/{id}', 'PlanController@edit')->name('plans.edit');
    Route::post('plans/store', 'PlanController@store')->name('plans.store');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans', 'PlanController@index')->name('index');

    /*
     * Home da Dashboard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});
