@extends('layouts.app')
@section('content')
<section class="section-head">
    <div>
        <h1>{{ $page->title }}</h1>
        <p>سند رسمی نیو جی‌پی‌تی برای آگاهی کامل قبل از خرید.</p>
    </div>
</section>

<div class="details-grid">
    <article class="panel rich-text">{!! nl2br(e($page->content)) !!}</article>
    <aside class="stack">
        <section class="panel">
            <h3 style="margin:0 0 .5rem">صفحات سیاست</h3>
            <div class="footer-links">
                <a href="{{ route('page.policy', ['page' => 'refund-policy']) }}">سیاست بازگشت وجه</a>
                <a href="{{ route('page.policy', ['page' => 'terms']) }}">قوانین خدمات</a>
                <a href="{{ route('page.policy', ['page' => 'privacy']) }}">حریم خصوصی</a>
            </div>
        </section>
        <section class="panel">
            <h3 style="margin:0 0 .5rem">نیاز به توضیح بیشتر؟</h3>
            <a class="btn btn-outline" href="{{ route('contact') }}">تماس با پشتیبانی</a>
        </section>
    </aside>
</div>
@endsection
