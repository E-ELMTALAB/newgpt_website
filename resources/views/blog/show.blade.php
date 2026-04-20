@extends('layouts.app')
@section('content')
<article class="panel rich-text" style="padding:1.2rem; max-width:900px; margin-inline:auto;">
    <span class="badge">{{ optional($post->published_at)->format('Y/m/d') }}</span>
    <h1 style="margin:.7rem 0 .55rem">{{ $post->title }}</h1>
    <p style="font-weight:700">{{ $post->excerpt }}</p>
    <hr style="border-color:rgba(255,255,255,.12); margin:1rem 0">
    {!! nl2br(e($post->content)) !!}
</article>
@endsection
