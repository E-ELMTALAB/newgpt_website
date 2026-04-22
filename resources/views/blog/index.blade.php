@extends('layouts.app')
@section('content')
<section class="section-head">
    <div class="page-heading">
        <h1>مجله خرید هوشمند</h1>
        <p>راهنمای پلن‌ها، مقایسه سرویس‌ها، و نکات استفاده حرفه‌ای از اشتراک‌های دیجیتال.</p>
    </div>
</section>

<section class="grid-cards">
    @forelse($posts as $post)
        @include('partials.store.blog-card', ['post' => $post])
    @empty
        <article class="panel">هنوز مقاله‌ای منتشر نشده است.</article>
    @endforelse
</section>

<div class="spaced-top">{{ $posts->links() }}</div>
@endsection
