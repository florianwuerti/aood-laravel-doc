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

Auth::routes();

Route::get( '/', 'HomeController@index' )->name( 'dashboard' );

Route::prefix( 'manage' )->middleware( 'role:superadministrator|administrator|editor|author|contributor' )->group( function () {

	Route::get( '/', 'ManageController@index' );
	Route::get( '/dashboard', 'ManageController@dashboard' )->name( 'manage.dashboard' );
	Route::resource( '/users', 'UserController' );
	Route::resource( '/permissions', 'PermissionController', [ 'except' => 'destory' ] );
	Route::resource( '/roles', 'RoleController', [ 'except' => 'destory' ] );

} );
