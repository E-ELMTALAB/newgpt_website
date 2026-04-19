@extends('layouts.app')
@section('content')
<article class="card"><h1>{{ $page->title }}</h1><div>{!! nl2br(e($page->content)) !!}</div></article>
@endsection
