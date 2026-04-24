@extends('layouts.app')
@section('content')
<article class="pd-page">
    <section class="pd-reference-hero panel">
        <div class="pd-reference-main">
            <div class="pd-reference-copy">
                <div class="pd-breadcrumbs">
                    <a href="{{ route('home') }}">خانه</a>
                    <span>‹</span>
                    <a href="{{ route('products.index') }}">محصولات</a>
                    <span>‹</span>
                    <span>{{ $product->name }}</span>
                </div>
                <h1 class="pd-reference-title">{{ $product->name }}</h1>

                <section class="pd-reference-price">
                    @if(!empty($product->badge_text))
                        <span class="pd-discount-chip">{{ $product->badge_text }}</span>
                    @endif
                    <div class="pd-price-wrap">
                        <strong>{{ number_format($product->price) }}</strong>
                        <span>تومان</span>
                    </div>
                    @if($product->compare_price)
                        <del>{{ number_format($product->compare_price) }} تومان</del>
                    @endif
                </section>

                <ul class="pd-feature-list">
                    <li>{{ $product->short_description }}</li>
                    <li>دسترسی سریع و فعال‌سازی امن برای حساب اختصاصی</li>
                    <li>پشتیبانی مرحله‌به‌مرحله تا زمان استفاده کامل</li>
                    <li>اولویت پاسخ‌گویی در ساعات پرترافیک</li>
                    <li>{{ $product->delivery_notes ?: 'تحویل فوری دیجیتال با تضمین بازگشت وجه' }}</li>
                </ul>

                <section class="pd-bonus-strip">
                    <strong>هدیه همراه</strong>
                    <span>راهنمای کامل استفاده از محصول (PDF)</span>
                </section>

                <div class="pd-cta-wrap">
                    <a class="btn pd-main-cta" href="{{ route('checkout.show', $product) }}">خرید اکانت در لحظه</a>
                    <p>تحویل فوری دیجیتال • پشتیبانی ۲۴ ساعته • ضمانت بازگشت وجه</p>
                </div>

                <div class="pd-meta-icons">
                    <span>پشتیبانی کامل</span>
                    <span>پرداخت امن</span>
                    <span>تحویل فوری</span>
                </div>
            </div>

            <div class="pd-reference-side">
                <div class="pd-reference-media">
                    @if($product->featured_image)
                        <img src="{{ $product->featured_image }}" alt="{{ $product->name }}">
                    @else
                        <span class="pd-hero-media-fallback">{{ mb_substr($product->name, 0, 1) }}</span>
                    @endif
                </div>

                @php($offerCards = [
                    ['title' => 'Go اختصاصی', 'price' => 1899000, 'old' => 2199000],
                    ['title' => 'فعال‌سازی روی اکانت شخصی بدون ضمانت', 'price' => 2199000, 'old' => 2499000],
                    ['title' => 'پلن یک‌ماهه دانشجویی اختصاصی', 'price' => 979000, 'old' => 1179000],
                    ['title' => 'اکانت پیش ساخته یک‌ماهه پلاس اختصاصی', 'price' => 1245000, 'old' => 1549000],
                    ['title' => 'فعال‌سازی روی اکانت شخصی با پشتیبانی و ضمانت', 'price' => 2199000, 'old' => 2499000],
                ])
                <div class="pd-offers-grid">
                    @foreach($offerCards as $offer)
                        <article class="pd-offer-card {{ $loop->last ? 'is-wide' : '' }}">
                            <h3>{{ $offer['title'] }}</h3>
                            <del>{{ number_format($offer['old']) }} تومان</del>
                            <strong>{{ number_format($offer['price']) }} تومان</strong>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
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
