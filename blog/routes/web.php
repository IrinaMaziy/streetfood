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

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/products', function () {
	return view('pages.shop-grid-4-column');
})->name('products');

Route::get('/single-product', function () {
	return view('pages.single-product-v1');
})->name('single-product');

Route::get('/login-and-register', function () {
	return view('pages.login-and-register');
})->name('login-and-register');

Route::get('/track-order', function () {
	return view('pages.track-order');
})->name('track-order');

Route::get('/blog', function () {
	return view('pages.blog');
})->name('blog');
