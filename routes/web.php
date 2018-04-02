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

// Base

// 3-2
Route::get('/', function () {
	return view('welcome');
});

// 3-3
Route::get('/', function () {
	return '<h1>Hello Foo</h1>';
});

// // 3-4
// Route::get('/{foo}', function ($foo) {
// 	return $foo;
// });

// // 3-5
// // /{foo}/profile 가능
// // /?foo=bar
// Route::get('/{foo?}', function ($foo = 'bar') {
// 	return $foo;
// });

// // 3-6
// Route::pattern('foo', '[0-9a-zA-Z]{3}');
// Route::get('/{foo?}', function ($foo = 'bar') {
// 	return $foo;
// });

// // 3-7
// Route::get('/{foo?}', function ($foo = 'bar') {
// 	return $foo;
// })->where('foo', '[0-9a-zA-Z]{3}');

// 3-8
Route::get('/', [
	'as' => 'home_r',
	function () {
		return 'My name is "home" !!';
	}
]);
Route::get('/home_22', function () {
	return redirect(route('home_r'));
});

// 4-1
Route::get('/', function () {
	return view('errors.503');
});

// 4-2
Route::get('/', function () {
	return view('welcome')->with('name', 'Foo');
});

// 4-4
Route::get('/', function () {
	return view('welcome')->with([
		'name' => 'Foo',
		'greeting' => 'Hello ??',
	]);
});