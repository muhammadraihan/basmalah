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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // // check if user is auth then redirect to dashboard page
//     // if (Auth::check()) {
//     //     return redirect()->route('backoffice.dashboard');
//     // }
//     return view('pages.home');
// });

Route::group(['prefix' => '/'], function () {
    Route::view('/', 'FrontEndController', 'pages.home')->name('home');
    Route::get('/', 'FrontEndController@index')->name('home');
    Route::view('about', 'FrontEndController', 'pages.about')->name('about');
    Route::get('about', 'FrontEndController@about')->name('about');
    Route::view('umrah', 'FrontEndController', 'pages.umrah')->name('umrah');
    Route::get('umrah', 'FrontEndController@umrah')->name('umrah');
    Route::view('haji', 'FrontEndController', 'pages.haji')->name('haji');
    Route::get('haji', 'FrontEndController@haji')->name('haji');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'backoffice', 'middleware' => ['auth']], function () {
    // backoffice
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@dashboard')->name('backoffice.dashboard');
    // logs
    Route::get('logs', 'ActivityController@index')->name('logs');
    // profile
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::patch('profile/{user}/update', 'UserController@ProfileUpdate')->name('profile.update');
    Route::patch('profile/{user}/password', 'UserController@ChangePassword')->name('profile.password');
    // resource
    Route::resource('menus', 'MenuController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
    Route::resource('hotel', 'HotelController');
    Route::resource('about', 'AboutController');
    Route::resource('transport', 'TransportController');
    Route::resource('paket', 'PaketController');
    Route::resource('brosur', 'BrosurController');
    Route::resource('home', 'HomeController');
    Route::resource('youtube', 'YoutubeController');
});
