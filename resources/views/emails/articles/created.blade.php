<!-- <h1>
	{{ $article->title }}
	<small>{{ $article->user->name }}</small>
</h1>
<hr/>
<p>
	{{ $article->content }}
	<small>{{ $article->created_at }}</small>
</p>
<hr/>
<footer>
	이 메일은 {{ config('app.url') }} 에서 보냈습니다.
</footer> -->

<p>
	<h1>
		{{ $article->content }}
		<small>{{ $article->created_at }}</small>
	</hr>
	</hr>
	<div style="text-align: center;">
		<img src="{{ $message->embed(storage_path('/framework/testing/lara.png')) }}" alt="">
	</div>
</p>