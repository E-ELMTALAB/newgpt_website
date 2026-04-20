@extends('layouts.app')
@section('content')
<section class="section-head">
    <div>
        <h1>{{ isset($currentCategory) ? 'دسته‌بندی: '.$currentCategory->name : 'فروشگاه محصولات دیجیتال' }}</h1>
        <p>{{ isset($currentCategory) ? ($currentCategory->description ?: 'محصولات این دسته با تحویل سریع و پشتیبانی واقعی.') : 'انتخاب پلن مناسب برای اشتراک‌های هوش مصنوعی، شبکه اجتماعی و ابزارهای کاری.' }}</p>
    </div>
</section>

<nav class="chips" aria-label="دسته‌بندی محصولات">
    <a class="{{ !isset($currentCategory) ? 'active' : '' }}" href="{{ route('products.index') }}">همه</a>
    @foreach($categories as $category)
        <a class="{{ (isset($currentCategory) && $currentCategory->id === $category->id) ? 'active' : '' }}" href="{{ route('products.category',$category) }}">{{ $category->name }}</a>
    @endforeach
</nav>

<section class="grid-cards">
    @forelse($products as $product)
        @include('partials.store.product-card', ['product' => $product])
    @empty
        <article class="panel">محصولی برای این دسته ثبت نشده است.</article>
    @endforelse
</section>

<div style="margin-top:1rem">{{ $products->links() }}</div>
@endsection
