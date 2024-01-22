<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#permission management routes
Route::prefix('permissions')->group(function () {
    Route::get('/', 'Settings\PermissionController@index')->name('view-permissions');
    Route::post('store',  'Settings\PermissionController@store')->name('store-permission')->middleware('has_permission:store-permission');
    Route::post('update', 'Settings\PermissionController@update')->name('update-permission')->middleware('has_permission:update-permission');
});
#role management routes
Route::prefix('roles')->group(function () {
    Route::get('/', 'Settings\RoleController@index')->name('view-roles')->middleware('has_permission:view-roles');
    Route::post('store', 'Settings\RoleController@store')->name('store-role')->middleware('has_permission:store-role');
    Route::post('update', 'Settings\RoleController@update')->name('update-role')->middleware('has_permission:update-role');
    Route::get('configure/{role_id}', 'Settings\RoleController@configure')->name('configure-role');
});
#permissions in a role management routes
Route::prefix('role-permissions')->group(function () {
    Route::post('remove', 'Settings\RolePermissionController@remove')->name('remove-permission')->middleware('has_permission:remove-permission');
    Route::post('add', 'Settings\RolePermissionController@add')->name('add-permission')->middleware('has_permission:add-permission');
});

#user management routes
Route::prefix('users')->group(function () {
    Route::get('/', 'Settings\UserController@index')->name('view-users')->middleware('has_permission:view-users');
    Route::post('update', 'Settings\UserController@update')->name('update-user')->middleware('has_permission:update-user');
    Route::post('store', 'Settings\UserController@store')->name('store-user')->middleware('has_permission:store-user');
});

#members routes
Route::prefix('members')->group(function () {
    Route::get('/', 'Core\MemberController@index')->name('view-members')->middleware('has_permission:view-members');
    Route::get('show/{business_id}', 'Core\MemberController@show')->name('view-contributions')->middleware('has_permission:view-contributions');
    Route::post('update', 'Core\MemberController@update')->name('update-member')->middleware('has_permission:update-member');
    Route::post('store', 'Core\MemberController@store')->name('store-member')->middleware('has_permission:store-member');
});
#contributions routes
Route::prefix('contributions')->group(function () {
    Route::post('update', 'Core\ContributionsController@update')->name('update-contribution')->middleware('has_permission:update-contribution');
    Route::post('store', 'Core\ContributionsController@store')->name('store-contribution')->middleware('has_permission:store-contribution');
});
