@extends('layouts.app')
@section('content')
<article class="card"><h1>{{ $post->title }}</h1><p>{{ $post->excerpt }}</p><div>{!! nl2br(e($post->content)) !!}</div></article>
@endsection
