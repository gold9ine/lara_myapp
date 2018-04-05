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

// 5-5
Route::get('/', function () {
	$items = ['apple', 'banana', 'tomato'];
	return view('welcome', ['items' => $items]);
});

// 8-1
Route::get('/', 'WelcomeController@index');

// 8-3
Route::resource('articles', 'ArticlesController');

// 9-3
Route::get('/', 'WelcomeController@index');
Route::get('auth/login', function () {
	$credentials = [
		'email' => 'john@example.com',
		'password' => 'password'
	];
	if (! auth()->attempt($credentials, true)) {
		return 'login info not correct';
	}
	return redirect('protected');
});
// Route::get('protected', function () {
// 	dump(session()->all());
// 	if (! auth()->check()) {
// 		return 'who are you?';
// 	}
// 	return 'welcome' . auth()->user()->name;
// });
Route::get('protected', ['middleware' => 'auth', function () {
	return 'welcome !!';
}]);
Route::get('auth/logout', function () {
	auth()->logout();
	return 'see you again !!';
});

// 9-2 라라벨 내장 사용자 인증
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 12-1
Route::resource('articles', 'ArticlesController');

// 12-4
// DB::listen(function ($query){
// 	// var_dump($query->sql);
// 	dump($query->sql);
// });

// 13-1
Route::resource('articles', 'ArticlesController');

// 14-2
// Event 파사드에 listen(string|array $events, mixed $listener) 메서드
// Event::listen('이벤트_이름', '처리_로직');
// Event::listen('article.created', function ($article) {
// 	echo("<pre>");
// 	var_dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다._web');
// 	var_dump($article->toArray());
// 	echo("</pre>");
// });

// 16-3
Route::get('mail', function () {
	$article = App\Article::with('user')->find(1);

	return Mail::send(
		'emails.articles.created',
		compact('article'),
		function ($message) use ($article) {
			$message->to('your@jiran.com');
			$message->subject('새 글이 등록되었습니다 - ' . $article->title);
		}
	);
});

// 16-6
Route::get('mail', function () {
	$article = App\Article::with('user')->find(1);
	return Mail::send(
		'emails.articles.created',
		compact('article'),
		function ($message) use ($article) {
			// $message->from('your@gmail.com', 'fromyong');
			// $message->to(['your@naver.com', 'your@hanmail.net']);
			$message->to('your@jiran.com');
			$message->subject('새 글이 등록되었습니다. - ', $article->title);
			// $message->cc('your@daum.com');
			// $message->attach(storage_path('framework/testing/lara.png'));
		}
	);
});

// 16-7
Route::get('mail', function () {
	$article = App\Article::with('user')->find(1);

	return Mail::send(
		// 'emails.articles.created',
		['text' => 'emails.articles.created-text'],
		compact('article'),
		function ($message) use ($article) {
			$message->to('your@jiran.com');
			$message->subject('새 글이 등록되었습니다 - ' . $article->title);
		}
	);
});

// 17-1
Route::get('markdown', function () {
$text = <<<EOT
# 마크다운 예제 1

이 문서는 [마크다운][1]으로 썼습니다. 화면에는 HTML로 변환되어 출력됩니다.

## 순서 없는 목록

- 첫 번째 항목
- 두 번째 항목[^1]

[1]: http://daringfireball.net/projects/markdown

[^1]: 두 번째 항목_ http://google.com
EOT;

	return app(ParsedownExtra::class)->text($text);
});