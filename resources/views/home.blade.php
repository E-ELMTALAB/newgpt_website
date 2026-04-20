@extends('layouts.app')
@section('content')
<section class="home-hero glass">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="home-hero-content">
        <span class="kicker">پلتفرم پیشرو در اشتراک‌های دیجیتال</span>
        <h1>خرید اکانت ChatGPT و ابزارهای AI با تحویل آنی</h1>
        <p>اکانت‌های قانونی، پشتیبانی واقعی و فعال‌سازی سریع برای تجربه‌ای بدون دغدغه در خرید سرویس‌های دیجیتال.</p>

        <div class="home-hero-trust">
            <article>
                <span>⟳</span>
                <strong>تضمین تعویض</strong>
            </article>
            <article>
                <span>🛡</span>
                <strong>اکانت‌های اصل</strong>
            </article>
            <article>
                <span>⏰</span>
                <strong>پشتیبانی ۲۴/۷</strong>
            </article>
        </div>

        <div class="hero-actions">
            <a class="btn" href="{{ route('products.index') }}">مشاهده محصولات</a>
            <a class="btn btn-outline" href="{{ route('contact') }}">مشاوره خرید</a>
        </div>
    </div>
</section>

<section class="section-head">
    <div>
        <h2>محصولات منتخب</h2>
        <p>پرفروش‌ترین سرویس‌های قابل تحویل با تضمین پشتیبانی.</p>
    </div>
</section>
<section class="grid-cards">
    @forelse($featuredProducts as $product)
        @include('partials.store.product-card', ['product' => $product])
    @empty
        <article class="panel">محصول ویژه‌ای ثبت نشده است.</article>
    @endforelse
</section>

<section class="section-head">
    <h2>بنرهای دسته‌بندی</h2>
</section>
<section class="home-banner-grid">
    @foreach($categories->take(2) as $category)
        <a href="{{ route('products.category', $category) }}" class="home-banner panel">
            <div>
                <span class="badge">{{ $category->name }}</span>
                <h3>کلکسیون {{ $category->name }}</h3>
                <p>{{ $category->description ?: 'محصولات این دسته را با پشتیبانی کامل مشاهده کنید.' }}</p>
            </div>
            <strong>مشاهده دسته ←</strong>
        </a>
    @endforeach
</section>

@if($discountProducts->isNotEmpty())
<section class="section-head">
    <div>
        <h2>پیشنهادهای ویژه</h2>
        <p>محصولات دارای تخفیف با تحویل سریع و تضمین فعال‌سازی.</p>
    </div>
</section>
<section class="grid-cards">
    @foreach($discountProducts as $product)
        @include('partials.store.product-card', ['product' => $product])
    @endforeach
</section>
@endif

<section class="home-collection-banner panel">
    <div>
        <span class="kicker">کلکسیون‌های سوشیال مدیا</span>
        <h2>اکانت اینستاگرام، تلگرام و ابزارهای تولید محتوا</h2>
        <p>برای مدیریت و رشد سریع کسب‌وکار آنلاین، مجموعه سرویس‌های سوشیال مدیا را ببینید.</p>
    </div>
    <a class="btn" href="{{ route('products.index') }}">کشف کلکسیون‌ها</a>
</section>

<section class="section-head">
    <h2>شاخص‌های اعتماد</h2>
</section>
<section class="home-stats-strip">
    <article><strong>+۱۰,۰۰۰</strong><span>کاربر فعال</span></article>
    <article><strong>۳+ سال</strong><span>تجربه خدمات AI</span></article>
    <article><strong>۱۰۰٪</strong><span>پرداخت امن</span></article>
</section>

@include('partials.store.trust-strip')

<section class="section-head">
    <h2>راهنمای انتخاب و خرید</h2>
</section>
<section class="seo-content-card panel" data-collapsible>
    <div class="seo-content" data-collapsible-content>
        <h3>چطور بهترین پلن را انتخاب کنم؟</h3>
        <p>اگر استفاده شما روزانه و حرفه‌ای است، پلن‌های کامل‌تر برای شما مناسب‌تر هستند. برای استفاده سبک، پلن‌های اقتصادی انتخاب بهتری خواهند بود.</p>
        <p>پس از خرید، اطلاعات اکانت و راهنمای فعال‌سازی در سریع‌ترین زمان ارسال می‌شود. تیم پشتیبانی تا زمان فعال شدن کامل سرویس همراه شماست.</p>
        <p>برای سفارش‌های سازمانی، مشاوره اختصاصی ارائه می‌شود تا انتخاب پلن، تعداد اکانت‌ها، و ساختار دسترسی متناسب با نیاز تیم شما انجام شود.</p>
    </div>
    <button class="btn btn-ghost btn-sm" type="button" data-collapsible-toggle>مشاهده توضیحات کامل</button>
</section>

<section class="section-head">
    <h2>سوالات متداول</h2>
</section>
<section class="faq-stack stack">
    @foreach($faqs as $faq)
        <details>
            <summary>{{ $faq->question }}</summary>
            <p>{{ $faq->answer }}</p>
        </details>
    @endforeach
</section>

<section class="section-head">
    <div>
        <h2>از مجله نیو جی‌پی‌تی</h2>
        <p>بررسی محصولات، مقایسه سرویس‌ها و آموزش‌های کاربردی.</p>
    </div>
    <a class="btn btn-ghost" href="{{ route('blog.index') }}">مشاهده همه مقالات</a>
</section>
<section class="grid-cards">
    @forelse($blogPosts as $post)
        @include('partials.store.blog-card', ['post' => $post])
    @empty
        <article class="panel">مقاله‌ای برای نمایش وجود ندارد.</article>
    @endforelse
</section>
@endsection
