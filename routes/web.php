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

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {

    /* Rotas de Mesas */
    Route::any('tables/search', 'TablesController@search')->name('tables.search');
    Route::resource('tables', 'TablesController');

    /* Rotas de Categoria de produto para vinculação */
    Route::get('product/{id}/categories/{idCategory}/detach', 'CategoryProductController@detachPermissionProfile')->name('product.categories.detach');
    Route::post('product/{id}/categories', 'CategoryProductController@attachCategoriProduct')->name('product.categories.attach');
    Route::any('product/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('product.categories.available');
    Route::get('product/{id}/categories', 'CategoryProductController@categories')->name('product.categories');
    Route::get('categories/{id}/product', 'CategoryProductController@products')->name('categories.product');

    /* Rotas de Produtos */
    Route::any('products/search', 'ProductsController@search')->name('products.search');
    Route::resource('products', 'ProductsController');

    /* Rotas de Usuários */
    Route::any('categories/search', 'CategoriesController@search')->name('categories.search');
    Route::resource('categories', 'CategoriesController');

    /* Rotas de Usuários */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    /* Rotas de planos e perfil */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

    /* Rotas de Permissões de perfil */
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');


    /* Rotas de Permissões */
    Route::resource('permissions', 'ACL\PermissionController');


    /* Rotas dos perfils */
    // Com o middleware eu só acesso se eu tiver a permissão
    Route::resource('profiles', 'ACL\ProfileController');
   // Route::resource('profiles', 'ACL\ProfileController')->middleware('can:profiles');

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

Route::get('/plan{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

/*
 * Rotas de autenticação
 */
Auth::routes();
