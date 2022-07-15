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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Roles Routing
Route::get('/roles', 'App\Http\Controllers\UserManagementController@roles');
Route::get('/roles/add', 'App\Http\Controllers\UserManagementController@add_role');
Route::post('/roles/add', 'App\Http\Controllers\UserManagementController@role_store');
Route::get('/roles/edit/{id?}', 'App\Http\Controllers\UserManagementController@update_role');
Route::post('/roles/update/{id?}', 'App\Http\Controllers\UserManagementController@role_update');
Route::post('/roles/destroy/{id?}', 'App\Http\Controllers\UserManagementController@role_destroy');

// Users Routing
Route::get('/users', 'App\Http\Controllers\UserManagementController@users');
Route::get('/users/add', 'App\Http\Controllers\UserManagementController@add_user');
Route::post('/users/add', 'App\Http\Controllers\UserManagementController@user_store');
Route::get('/users/edit/{id?}', 'App\Http\Controllers\UserManagementController@update_user');
Route::post('/users/update/{id?}', 'App\Http\Controllers\UserManagementController@user_update');
Route::post('/users/destroy/{id?}', 'App\Http\Controllers\UserManagementController@user_destroy');

// Expenses Category Routing
Route::resource('/categories', 'App\Http\Controllers\CategoryController');
Route::get('/add/categories', 'App\Http\Controllers\CategoryController@add_category');
Route::get('/categories/edit/{id?}', 'App\Http\Controllers\CategoryController@update_category');
Route::post('/categories/{id?}/update', 'App\Http\Controllers\CategoryController@update');
Route::post('/categories/{id?}/destroy', 'App\Http\Controllers\CategoryController@destroy');

// Expenses Routing
Route::resource('/expenses', 'App\Http\Controllers\ExpensesController');
Route::get('/add/expenses', 'App\Http\Controllers\ExpensesController@add_expenses');
Route::get('/expenses/edit/{id?}', 'App\Http\Controllers\ExpensesController@update_expenses');
Route::post('/expenses/{id?}/update', 'App\Http\Controllers\ExpensesController@update');
Route::post('/expenses/{id?}/destroy', 'App\Http\Controllers\ExpensesController@destroy');

// Edit Profile Routing
Route::get('/profile/{id?}', 'App\Http\Controllers\ProfileController@edit');
Route::post('/profile/{id?}/update', 'App\Http\Controllers\ProfileController@update');