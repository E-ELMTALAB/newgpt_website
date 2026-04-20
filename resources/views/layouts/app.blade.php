<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $metaTitle ?? ($siteSetting->seo_title ?? 'خرید اشتراک هوش مصنوعی') }}</title>
    <meta name="description" content="{{ $metaDescription ?? ($siteSetting->seo_description ?? 'فروش تخصصی اکانت و اشتراک دیجیتال با تحویل سریع') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    @if(app()->environment('testing'))
        <style>body{font-family:Tahoma,sans-serif}</style>
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
<div class="page-shell">
    <header class="site-header">
        <div class="container topbar">
            <a href="{{ route('home') }}" class="logo">{{ $siteSetting->site_name ?? 'نیو جی‌پی‌تی' }}</a>
            <nav>
                <a href="{{ route('products.index') }}">محصولات</a>
                <a href="{{ route('blog.index') }}">وبلاگ</a>
                <a href="{{ route('contact') }}">پشتیبانی</a>
            </nav>
            <a class="btn btn-outline" href="/admin">پنل مدیریت</a>
        </div>
    </header>

    <main class="container page-main">@yield('content')</main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <h3 class="footer-title">{{ $siteSetting->site_name ?? 'نیو جی‌پی‌تی' }}</h3>
                <p>{{ $siteSetting->homepage_intro ?? 'ارائه اشتراک‌های دیجیتال با پشتیبانی واقعی، قیمت‌گذاری شفاف و تحویل سریع.' }}</p>
            </div>
            <div>
                <h4 class="footer-title">دسترسی سریع</h4>
                <div class="footer-links">
                    <a href="{{ route('home') }}">صفحه اصلی</a>
                    <a href="{{ route('products.index') }}">محصولات</a>
                    <a href="{{ route('blog.index') }}">وبلاگ</a>
                    <a href="{{ route('contact') }}">پشتیبانی</a>
                </div>
            </div>
            <div>
                <h4 class="footer-title">اعتماد شما</h4>
                <p>سفارش امن، تحویل سریع، پشتیبانی پاسخ‌گو و بروزرسانی مداوم خدمات.</p>
            </div>
        </div>
        <div class="container footer-note">{{ $siteSetting->footer_text ?? 'تمامی حقوق محفوظ است.' }}</div>
    </footer>
</div>
</body>
</html>
