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
<header class="container topbar">
    <a href="{{ route('home') }}" class="logo">{{ $siteSetting->site_name ?? 'نیو جی‌پی‌تی' }}</a>
    <nav>
        <a href="{{ route('products.index') }}">محصولات</a>
        <a href="{{ route('blog.index') }}">وبلاگ</a>
        <a href="{{ route('contact') }}">پشتیبانی</a>
    </nav>
    <a class="btn" href="/admin">پنل مدیریت</a>
</header>
<main class="container">@yield('content')</main>
<footer class="container footer">{{ $siteSetting->footer_text ?? 'تمامی حقوق محفوظ است.' }}</footer>
</body>
</html>
