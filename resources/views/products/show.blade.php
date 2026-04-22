@extends('layouts.app')
@section('content')
<article class="details-grid">
    <section class="panel">
        <span class="badge">{{ $product->category?->name ?? 'محصول دیجیتال' }}</span>
        <h1 class="detail-main-title">{{ $product->name }}</h1>
        <p>{{ $product->short_description }}</p>

        <div class="card-meta spaced-top">
            <div class="price-row">
                <strong>{{ number_format($product->price) }} تومان</strong>
                @if($product->compare_price)<del>{{ number_format($product->compare_price) }}</del>@endif
            </div>
            <a class="btn" href="{{ route('checkout.show',$product) }}">خرید مستقیم</a>
        </div>

        <div class="rich-text rich-block">{!! nl2br(e($product->description)) !!}</div>
    </section>

    <aside class="stack">
        <section class="panel">
            <h2 class="title-sm">تحویل و فعال‌سازی</h2>
            <p>{{ $product->delivery_notes ?: 'تحویل این محصول کمتر از ۳۰ دقیقه انجام می‌شود.' }}</p>
        </section>
        <section class="panel">
            <h2 class="title-sm">گارانتی و پشتیبانی</h2>
            <p>{{ $product->guarantee_notes ?: 'در طول دوره اشتراک پشتیبانی کامل ارائه می‌شود.' }}</p>
        </section>
        <section class="panel">
            <h2 class="title-sm">نیاز به انتخاب سریع دارید؟</h2>
            <a class="btn btn-outline" href="{{ route('contact') }}">ارتباط با پشتیبانی</a>
        </section>
    </aside>
</article>

<section class="section-head">
    <h2>محصولات مرتبط</h2>
</section>
<section class="grid-cards">
    @forelse($relatedProducts as $product)
        @include('partials.store.product-card', ['product' => $product])
    @empty
        <article class="panel">در این دسته محصول دیگری ثبت نشده است.</article>
    @endforelse
</section>
@endsection
