@extends('layouts.app')
@section('content')
<article class="panel rich-text post-article single-panel">
    <span class="badge">{{ optional($post->published_at)->format('Y/m/d') }}</span>
    <h1 class="detail-main-title">{{ $post->title }}</h1>
    <p><strong>{{ $post->excerpt }}</strong></p>
    <hr class="post-divider">
    {!! nl2br(e($post->content)) !!}
</article>
@endsection
