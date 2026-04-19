@extends('layouts.app')
@section('content')
<h1>پشتیبانی و تماس</h1>
<div class="grid">@foreach($methods as $method)<div class="card"><h3>{{ $method->title }}</h3><p>{{ $method->value }}</p></div>@endforeach</div>
@endsection
