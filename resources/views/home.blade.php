@extends('layouts.app')
@section('content')
<section class="hero glass">
    <div>
        <span class="kicker">فروشگاه پریمیوم اکانت دیجیتال</span>
        <h1>خرید سریع اکانت و اشتراک هوش مصنوعی با پشتیبانی واقعی</h1>
        <p>{{ $siteSetting->homepage_intro ?? 'تحویل سریع، گارانتی تعویض، و تیم پشتیبانی واقعی برای خرید مطمئن سرویس‌های دیجیتال.' }}</p>

        <div class="hero-actions">
            <a class="btn" href="{{ route('products.index') }}">مشاهده محصولات</a>
            <a class="btn btn-outline" href="{{ route('contact') }}">مشاوره قبل خرید</a>
        </div>
    </div>

    <div class="stat-grid">
        <article class="stat-item"><strong>+۱۲۰۰ سفارش</strong><span>ثبت موفق در ماه گذشته</span></article>
        <article class="stat-item"><strong>تحویل آنی</strong><span>فعال‌سازی ۵ تا ۳۰ دقیقه</span></article>
        <article class="stat-item"><strong>پشتیبانی ۷ روزه</strong><span>از خرید تا استفاده کامل</span></article>
    </div>
</section>

<section class="section-head">
    <div>
        <h2>نشان‌های اعتماد</h2>
        <p>طراحی فروش‌محور همراه با شفافیت قیمت و تضمین خدمات.</p>
    </div>
</section>
@include('partials.store.trust-strip')

<section class="section-head">
    <div>
        <h2>محصولات ویژه</h2>
        <p>محصولات پرفروش با پشتیبانی کامل و راهنمای فعال‌سازی.</p>
    </div>
    <a class="btn btn-ghost" href="{{ route('products.index') }}">مشاهده همه</a>
</section>
<section class="grid-cards">
    @foreach($featuredProducts as $product)
        @include('partials.store.product-card', ['product' => $product])
    @endforeach
</section>

<section class="section-head">
    <h2>دسته‌بندی سرویس‌ها</h2>
</section>
<section class="chips">
    @foreach($categories as $category)
        <a href="{{ route('products.category', $category) }}">{{ $category->name }}</a>
    @endforeach
</section>

<section class="section-head">
    <h2>سوالات متداول خرید</h2>
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
        <p>آموزش‌ها و راهنماهای تصمیم‌گیری قبل از خرید سرویس.</p>
    </div>
    <a class="btn btn-ghost" href="{{ route('blog.index') }}">ورود به وبلاگ</a>
</section>
<section class="grid-cards">
    @foreach($blogPosts as $post)
        @include('partials.store.blog-card', ['post' => $post])
    @endforeach
</section>
@endsection
