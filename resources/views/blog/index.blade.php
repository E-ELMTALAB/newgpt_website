@extends('layouts.app')
@section('content')
<h1>وبلاگ</h1>
<div class="grid">@foreach($posts as $post)<article class="card"><h2><a href="{{ route('blog.show',$post) }}">{{ $post->title }}</a></h2><p>{{ $post->excerpt }}</p></article>@endforeach</div>
{{ $posts->links() }}
@endsection
