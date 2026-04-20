@extends('layouts.app')
@section('content')
<section class="details-grid">
    <article class="panel">
        <h1 style="margin:0 0 .5rem">تسویه حساب</h1>
        <p>اطلاعات خرید را ثبت کنید تا سفارش شما بلافاصله پردازش شود.</p>

        <div class="panel" style="margin-top:1rem; background:rgba(255,255,255,.05)">
            <strong>{{ $product->name }}</strong>
            <p style="margin:.2rem 0">{{ $product->short_description }}</p>
            <div class="price-row"><strong>{{ number_format($product->price) }} تومان</strong></div>
        </div>

        <form method="post" action="{{ route('checkout.store',$product) }}" class="form" style="margin-top:1rem">@csrf
            <input name="customer_name" placeholder="نام و نام خانوادگی" value="{{ old('customer_name') }}" required>
            <input name="customer_email" type="email" placeholder="ایمیل" value="{{ old('customer_email') }}" required>
            <input name="customer_phone" placeholder="شماره موبایل" value="{{ old('customer_phone') }}" required>
            <textarea name="notes" placeholder="توضیحات (اختیاری)">{{ old('notes') }}</textarea>
            <button class="btn" type="submit">ثبت سفارش و پرداخت</button>
        </form>
    </article>

    <aside class="stack">
        <article class="panel">
            <h3 style="margin:0 0 .5rem">اعتماد در پرداخت</h3>
            <p>درگاه امن و ثبت خودکار سفارش با شماره پیگیری.</p>
            <span class="badge badge-ok">پرداخت امن</span>
        </article>
        <article class="panel">
            <h3 style="margin:0 0 .5rem">پشتیبانی پس از خرید</h3>
            <p>دستورالعمل فعال‌سازی و پاسخ سریع به سوالات فنی.</p>
        </article>
    </aside>
</section>
@endsection
