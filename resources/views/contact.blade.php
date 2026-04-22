@extends('layouts.app')
@section('content')
<section class="section-head">
    <div class="page-heading">
        <h1>پشتیبانی و ارتباط با ما</h1>
        <p>قبل از خرید یا بعد از پرداخت، تیم پشتیبانی برای راهنمایی کامل در کنار شماست.</p>
    </div>
</section>

@include('partials.store.trust-strip')

<section class="grid-cards spaced-top">
    @forelse($methods as $method)
        <article class="panel">
            <h3 class="contact-card-title">{{ $method->title }}</h3>
            <p>{{ $method->value }}</p>
            @if($method->link)
                <a class="btn btn-sm btn-outline inline-actions" href="{{ $method->link }}" target="_blank" rel="noopener">ورود به کانال</a>
            @endif
        </article>
    @empty
        <article class="panel">راه ارتباطی فعالی ثبت نشده است.</article>
    @endforelse
</section>
@endsection
