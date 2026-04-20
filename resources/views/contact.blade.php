@extends('layouts.app')
@section('content')
<section class="section-head">
    <div>
        <h1>پشتیبانی و ارتباط با ما</h1>
        <p>قبل از خرید یا بعد از پرداخت، تیم پشتیبانی برای راهنمایی کامل در کنار شماست.</p>
    </div>
</section>

@include('partials.store.trust-strip')

<section class="grid-cards" style="margin-top:1rem">
    @forelse($methods as $method)
        <article class="panel">
            <h3 style="margin:0 0 .35rem">{{ $method->title }}</h3>
            <p>{{ $method->value }}</p>
            @if($method->link)
                <a class="btn btn-sm btn-outline" style="margin-top:.7rem" href="{{ $method->link }}" target="_blank" rel="noopener">ورود به کانال</a>
            @endif
        </article>
    @empty
        <article class="panel">راه ارتباطی فعالی ثبت نشده است.</article>
    @endforelse
</section>
@endsection
