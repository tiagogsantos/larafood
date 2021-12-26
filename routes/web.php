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

    /* Rotas de Permissões */
    Route::resource('permissions', 'ACL\PermissionController');


    /* Rotas dos perfils */
    Route::resource('profiles', 'ACL\ProfileController');

    /*
    Route::delete('profiles/{id}', 'ProfileController@destroy')->name('profiles.destroy');
    Route::put('profiles/update/{id}', 'ProfileController@update')->name('profiles.update');
    Route::get('profiles/edit/{id}', 'ProfileController@edit')->name('profiles.edit');
    Route::post('profiles/store', 'ProfileController@store')->name('profiles.store');
    Route::get('profiles/create', 'ProfileController@create')->name('profiles.create');
    Route::get('profiles', 'ProfileController@index')->name('profiles.index');
    */

    /* Rotas dos detalhes do plano */
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');

    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

    /* Rotas de Filtro de */
    Route::any('plans/search', 'PlanController@search')->name('plans.search');

    /* Rotas de Planos */
    Route::delete('plans/{id}', 'PlanController@destroy')->name('plans.destroy');
    Route::put('plans/update/{id}', 'PlanController@update')->name('plans.update');
    Route::get('plans/edit/{id}', 'PlanController@edit')->name('plans.edit');
    Route::post('plans/store', 'PlanController@store')->name('plans.store');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans', 'PlanController@index')->name('index');

    /* Home da Dashboard */
    Route::get('/', 'PlanController@index')->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});
