@extends('layouts.app')
@section('content')
<article class="pd-page">
    <section class="pd-hero panel">
        <div class="pd-hero-media-wrap">
            <div class="pd-hero-media">
                @if($product->featured_image)
                    <img src="{{ $product->featured_image }}" alt="{{ $product->name }}">
                @else
                    <span class="pd-hero-media-fallback">{{ mb_substr($product->name, 0, 1) }}</span>
                @endif
            </div>
        </div>

        <div class="pd-hero-main">
            <div class="pd-hero-head">
                <span class="badge">{{ $product->category?->name ?? 'محصول دیجیتال' }}</span>
                @if(!empty($product->badge_text))
                    <span class="badge badge-ok">{{ $product->badge_text }}</span>
                @endif
            </div>

            <h1 class="detail-main-title">{{ $product->name }}</h1>

            <div class="pd-buy-row">
                <div class="price-row">
                    <strong>{{ number_format($product->price) }} تومان</strong>
                    @if($product->compare_price)<del>{{ number_format($product->compare_price) }}</del>@endif
                </div>
            </div>

            <p class="pd-subtitle">{{ $product->short_description }}</p>

            <div class="pd-actions">
                <a class="btn" href="{{ route('checkout.show', $product) }}">خرید مستقیم</a>
                <a class="btn btn-outline" href="{{ route('contact') }}">مشاوره قبل خرید</a>
            </div>

            <div class="pd-spec-grid">
                <article>
                    <strong>تحویل</strong>
                    <span>فعال‌سازی سریع</span>
                </article>
                <article>
                    <strong>پشتیبانی</strong>
                    <span>همراهی واقعی</span>
                </article>
                <article>
                    <strong>نوع اکانت</strong>
                    <span>{{ $product->category?->name ?? 'دیجیتال' }}</span>
                </article>
                <article>
                    <strong>تمدید</strong>
                    <span>قابل هماهنگی</span>
                </article>
            </div>
        </div>
    </section>

    <section class="pd-trust-strip">
        <article class="trust-item">
            <strong>تحویل سریع</strong>
            <span>ارسال اطلاعات حساب در کوتاه‌ترین زمان</span>
        </article>
        <article class="trust-item">
            <strong>پشتیبانی واقعی</strong>
            <span>پاسخ‌گویی مرحله‌به‌مرحله تا فعال‌سازی کامل</span>
        </article>
        <article class="trust-item">
            <strong>پرداخت امن</strong>
            <span>ثبت سفارش مطمئن با جزئیات شفاف</span>
        </article>
        <article class="trust-item">
            <strong>اطلاعات شفاف</strong>
            <span>نمایش کامل هزینه و شرایط قبل از ثبت سفارش</span>
        </article>
    </section>

    <section class="pd-body">
        <section class="panel pd-content">
            <div class="section-head pd-content-head">
                <h2>توضیحات و جزئیات محصول</h2>
            </div>
            <div class="rich-text">
                {!! nl2br(e($product->description)) !!}
            </div>
        </section>

        <aside class="pd-side stack">
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
                <a class="btn btn-outline full-width-btn" href="{{ route('contact') }}">ارتباط با پشتیبانی</a>
            </section>
        </aside>
    </section>

    <section class="pd-related panel">
        <div class="section-head pd-related-head">
            <h2>محصولات مرتبط</h2>
        </div>
        <section class="grid-cards pd-related-products">
            @forelse($relatedProducts as $relatedProduct)
                @include('partials.store.product-card', ['product' => $relatedProduct])
            @empty
                <article class="panel">در این دسته محصول دیگری ثبت نشده است.</article>
            @endforelse
        </section>
    </section>

    <section class="pd-related panel">
        <div class="section-head pd-related-head">
            <h2>مقالات مرتبط</h2>
        </div>
        <section class="grid-cards pd-related-posts">
            @forelse($relatedPosts as $post)
                @include('partials.store.blog-card', ['post' => $post])
            @empty
                <article class="panel">مقاله‌ای برای نمایش ثبت نشده است.</article>
            @endforelse
        </section>
    </section>
</article>
@endsection
