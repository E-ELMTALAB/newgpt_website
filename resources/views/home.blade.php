@extends('layouts.app')
@section('content')
<section class="hero">
    <div class="hero-content">
        <span class="badge">فروشگاه تخصصی اشتراک دیجیتال</span>
        <h1>خرید مطمئن اکانت‌های دیجیتال و اشتراک هوش مصنوعی</h1>
        <p>{{ $siteSetting->homepage_intro ?? 'تحویل سریع، پشتیبانی واقعی و قیمت‌گذاری شفاف برای کسب‌وکارها و کاربران حرفه‌ای.' }}</p>
        <div class="hero-actions">
            <a class="btn" href="{{ route('products.index') }}">مشاهده محصولات</a>
            <a class="btn btn-outline" href="{{ route('contact') }}">مشاوره خرید</a>
        </div>
    </div>
    <div class="hero-stats">
        <article class="stat-card"><strong>تحویل</strong><span>از ۵ تا ۳۰ دقیقه</span></article>
        <article class="stat-card"><strong>پشتیبانی</strong><span>۷ روز هفته</span></article>
        <article class="stat-card"><strong>گارانتی</strong><span>اصالت سرویس</span></article>
    </div>
</section>

<section class="section-head">
    <div>
        <h2>محصولات ویژه</h2>
        <p>منتخب سرویس‌های پرفروش با فعال‌سازی سریع و پشتیبانی کامل.</p>
    </div>
    <a class="btn btn-ghost" href="{{ route('products.index') }}">مشاهده همه</a>
</section>
<section>
    <div class="grid">
        @foreach($featuredProducts as $product)
            <article class="card card-product">
                <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
                <p>{{ $product->short_description }}</p>
                <div class="card-meta">
                    <strong>{{ number_format($product->price) }} تومان</strong>
                    <a class="btn btn-sm" href="{{ route('products.show', $product) }}">جزئیات</a>
                </div>
            </article>
        @endforeach
    </div>
</section>

<section class="section-head">
    <h2>دسته‌بندی‌ها</h2>
</section>
<section class="category-grid">
    @foreach($categories as $category)
        <a class="card category-card" href="{{ route('products.category', $category) }}">{{ $category->name }}</a>
    @endforeach
</section>

<section class="section-head">
    <h2>سوالات متداول</h2>
</section>
<section class="faq-stack">
    @foreach($faqs as $faq)
        <details class="card faq-item">
            <summary>{{ $faq->question }}</summary>
            <p>{{ $faq->answer }}</p>
        </details>
    @endforeach
</section>

<section class="section-head">
    <div>
        <h2>آخرین مقالات</h2>
        <p>جدیدترین مطالب آموزشی و راهنمای خرید سرویس‌های دیجیتال.</p>
    </div>
    <a class="btn btn-ghost" href="{{ route('blog.index') }}">مشاهده وبلاگ</a>
</section>
<section>
    <div class="grid">
        @foreach($blogPosts as $post)
            <article class="card">
                <h3><a href="{{ route('blog.show',$post) }}">{{ $post->title }}</a></h3>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="cta-strip">
    <h2>برای انتخاب بهترین اشتراک نیاز به راهنمایی دارید؟</h2>
    <p>تیم پشتیبانی آماده است تا مناسب‌ترین پلن را بر اساس نیاز شما معرفی کند.</p>
    <a class="btn" href="{{ route('contact') }}">ارتباط با پشتیبانی</a>
</section>
@endsection
