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

Route::get('/admin/dashboard', '\\' . \App\Http\Controllers\Dashboard::class)->name('admin-dashboard');
//Route::get('/admin/dashboard-master', '\\' . \App\Http\Controllers\DashboardMaster::class)->name('dashboard-master');




Route::get('/products/{key}','\\'. \App\Http\Controllers\ProductsAction::class)->name('products');

Route::get('/cart/add/{id}', '\\'. \App\Http\Controllers\SingleProductAction::class)->name('add-to-cart');

Route::get('/cart/remove/{id}', '\\'. \App\Http\Controllers\RemoveFromCart::class)->name('remove-from-cart');

Route::get('/cart', '\\'. \App\Http\Controllers\ShowCartAction::class)->name('show-cart');


// сохранение данных
Route::match(['get', 'post'], '/admin/form', '\\'. \App\Http\Controllers\FormAction::class)->name('admin-form');

//обновление данных
Route::match(['get', 'post'], '/admin/updateform', '\\'. \App\Http\Controllers\UpdateFormAction::class)->name('admin-update-form');

//удаление данных
/*
Route::match(['get'], '/admin/products', function(){
	return view('admin/products-list', ['products' => \App\Product::all()] );
})->name('admin-products');

Route::match(['delete'], '/admin/products-delete', function(\Illuminate\Http\Request $request){
	$product = \App\Product::find($request->input('id'));
	$product->delete();
	return back();
})->name('admin-products');*/

//удаление данных
Route::match(['get'], '/admin/products', 'DeleteFormAction@__invoke')->name('admin-products');
Route::match(['delete'], '/admin/products-delete',  'DeleteFormAction@delete')->name('admin-products');






Route::get('/login-and-register', function () {
	return view('pages.login-and-register');
})->name('login-and-register');

Route::get('/track-order', function () {
	return view('pages.track-order');
})->name('track-order');

Route::get('/blog', function () {
	return view('pages.blog');
})->name('blog');

Route::get('/shopping-cart', function () {
	return view('pages.cart');
})->name('shopping-cart');

Route::get('/send-email', function () {
$mail = new \App\Mail\UserSubscribed();
$mail->subject('Приветствуем в онлайн-ресторане Streetfood!');
	\Illuminate\Support\Facades\Mail::to('glukmush@gmail.com')->send($mail);
})->name('send-email');
Route::post('/subscribe', function(\Illuminate\Http\Request $request){
	var_dump($request->input('email'));
})->name('subscribe');