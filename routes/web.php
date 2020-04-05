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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('role', 'RoleController@index')->name('role.index');
Route::post('role', 'RoleController@store')->name('role.store');
Route::delete('role/{role}', 'RoleController@destroy')->name('role.destroy');

Route::get('permission', 'PermissionController@index')->name('permissions.index');
Route::get('permission/assign/{role}', 'PermissionController@assign')->name('permission.assign');
Route::post('permission/save/{role}', 'PermissionController@save')->name('permission.save');


Route::resource('package', 'PackageController');
