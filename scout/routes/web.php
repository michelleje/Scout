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

Route::get('/', 'HomepageController@index', function () {
    return view('homepage');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/management_companies', function () {
    return view('management_companies');
});

Route::get('/results','ListingController@index', function () {
    return view('results');
});

Route::get('/single-listing-centurion', function () {
    return view('single-listing-centurion');
});

Route::get('/single-listing-chez', function () {
    return view('single-listing-chez');
});

Route::get('/single-listing-gateway', function () {
    return view('single-listing-gateway');
});

Route::get('/single-listing-shrine', function () {
    return view('single-listing-shrine');
});

Route::get('/listing/{id}', function () {
    return view('single-listing');
});
