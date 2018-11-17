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



//Route::get('/', function () {
//    return view('welcome');
//});

// Auth Login & Home web routes
//Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Home Routes...
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// Notifications web routes
Route::get('/notifications-{filter}', 'NotificationsController@show')->name('notifications');
Route::get('/notification-markasunread-{id}', 'NotificationsController@markasunread')->name('notifications');
Route::get('/notification-markasread-{id}', 'NotificationsController@markasread')->name('notifications');
Route::get('/notification-delete-{id}', 'NotificationsController@delete')->name('notifications');
// NavBar notifications routes
Route::get('markAsRead',function(){
    // Mark all notifications as read
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('markAllRead');

// Admin Config web routes
Route::get('/users-config-index', 'UsersController@showUsersConfigIndex')->name('users-config');
Route::post('/filter-users', 'UsersController@showFiltered')->name('users-filter');
Route::get('/create-user', 'UsersController@create')->name('users-create');
Route::get('/delete-user-{id}', 'UsersController@delete')->name('users-delete');
Route::get('/change-status-user-{id}', 'UsersController@change-status')->name('users-change-status');
Route::get('/edit-user-{id}', 'UsersController@edit')->name('users-edit');

// Projects web routes
Route::get('/projects-index', 'ProjectsController@index')->name('projects');

// Tasks web routes



// Test web routes
Route::get('/test','TestController@testdrill2')->name('drill2');
//$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');
