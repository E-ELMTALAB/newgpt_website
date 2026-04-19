@extends('layouts.app')
@section('content')
<h1>{{ isset($currentCategory) ? 'محصولات دسته '.$currentCategory->name : 'همه محصولات' }}</h1>
<div class="chips">@foreach($categories as $category)<a href="{{ route('products.category',$category) }}">{{ $category->name }}</a>@endforeach</div>
<div class="grid">@foreach($products as $product)<article class="card">
<h2><a href="{{ route('products.show',$product) }}">{{ $product->name }}</a></h2>
<p>{{ $product->short_description }}</p>
<strong>{{ number_format($product->price) }} تومان</strong>
<a class="btn" href="{{ route('products.show',$product) }}">جزئیات</a>
</article>@endforeach</div>
{{ $products->links() }}
@endsection
