<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? (optional($siteSetting)->seo_title ?? 'خرید اشتراک هوش مصنوعی') }}</title>
    <meta name="description" content="{{ $metaDescription ?? (optional($siteSetting)->seo_description ?? 'فروش تخصصی اکانت و اشتراک دیجیتال با تحویل سریع') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    @if(app()->environment('testing'))
        <style>body{font-family:Tahoma,sans-serif}</style>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="{{ request()->routeIs('home') ? 'is-home' : '' }}">
<div class="page-shell">
    <header class="site-header">
        <div class="container topbar">
            <a href="{{ route('home') }}" class="brand">
                <strong>{{ optional($siteSetting)->site_name ?? 'نیو جی‌پی‌تی' }}</strong>
                <span>{{ optional($siteSetting)->site_tagline ?? 'فروش اکانت‌های دیجیتال مطمئن' }}</span>
            </a>

            <button class="nav-toggle" type="button" aria-label="باز کردن منو" aria-expanded="false" data-nav-toggle data-nav-target="main-nav">
                ☰
            </button>

            <nav class="main-nav" id="main-nav" aria-label="منوی اصلی" data-main-nav>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">خانه</a>
                <a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">وبلاگ</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">پشتیبانی</a>
                <a href="{{ route('cart.index') }}" class="{{ request()->routeIs('cart.*') ? 'active' : '' }}">سبد خرید</a>
            </nav>
        </div>
    </header>

    <main class="container page-main">@yield('content')</main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <h3 class="footer-title">{{ optional($siteSetting)->site_name ?? 'نیو جی‌پی‌تی' }}</h3>
                <p>{{ optional($siteSetting)->homepage_intro ?? 'ارائه اشتراک‌های دیجیتال با پشتیبانی واقعی، قیمت‌گذاری شفاف و تحویل سریع.' }}</p>
            </div>
            <div>
                <h4 class="footer-title">لینک‌های اصلی</h4>
                <div class="footer-links">
                    <a href="{{ route('home') }}">صفحه اصلی</a>
                    <a href="{{ route('products.index') }}">همه محصولات</a>
                    <a href="{{ route('blog.index') }}">مقالات آموزشی</a>
                    <a href="{{ route('contact') }}">تماس و پشتیبانی</a>
                </div>
            </div>
            <div>
                <h4 class="footer-title">اعتماد و قوانین</h4>
                <div class="footer-links">
                    <a href="{{ route('page.policy', ['page' => 'refund-policy']) }}">بازگشت وجه</a>
                    <a href="{{ route('page.policy', ['page' => 'terms']) }}">قوانین خدمات</a>
                    <a href="{{ route('page.policy', ['page' => 'privacy']) }}">حریم خصوصی</a>
                </div>
            </div>
            <div>
                <h4 class="footer-title">خدمات سریع</h4>
                <p>پرداخت امن، فعال‌سازی سریع، تحویل اکانت و پشتیبانی مرحله‌به‌مرحله.</p>
                <a class="btn btn-sm btn-outline" href="{{ route('contact') }}">درخواست مشاوره</a>
            </div>
        </div>
        <div class="container footer-note">{{ optional($siteSetting)->footer_text ?? 'تمامی حقوق محفوظ است.' }}</div>
    </footer>
</div>
</body>
</html>
