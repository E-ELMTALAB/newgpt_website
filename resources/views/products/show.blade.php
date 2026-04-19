@extends('layouts.app')
@section('content')
<article class="card">
<h1>{{ $product->name }}</h1>
<p>{{ $product->short_description }}</p>
<p><strong>{{ number_format($product->price) }} تومان</strong></p>
@if($product->compare_price)<p><del>{{ number_format($product->compare_price) }}</del></p>@endif
<a class="btn" href="{{ route('checkout.show',$product) }}">خرید مستقیم</a>
<hr>
<p>{{ $product->description }}</p>
<h2>تحویل و فعال‌سازی</h2><p>{{ $product->delivery_notes }}</p>
<h2>گارانتی و پشتیبانی</h2><p>{{ $product->guarantee_notes }}</p>
</article>
<section><h2>محصولات مرتبط</h2><div class="grid">@foreach($relatedProducts as $related)<a class="card" href="{{ route('products.show',$related) }}">{{ $related->name }}</a>@endforeach</div></section>
@endsection
