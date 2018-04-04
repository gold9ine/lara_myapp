{{ $article->user->name }}님이 새 글을 등록했습니다.
---
{{ $article->content }}
{{ $article->created_at }}에 작성됨
---
이 메일은 {{ config('app.url') }}에서 보냈습니다.