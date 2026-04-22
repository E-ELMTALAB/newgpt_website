@extends('layouts.app')
@section('content')
<section class="panel single-panel">
    <h1 class="title-sm">سفارش شما با موفقیت ثبت شد ✅</h1>
    <p class="notice">تراکنش در حالت شبیه‌سازی‌شده تایید شد و سفارش برای تحویل آماده است.</p>

    <table class="table-lite summary-table-wrap">
        <tr><td>شماره سفارش</td><td>{{ $order->order_number }}</td></tr>
        <tr><td>وضعیت</td><td>{{ $order->status }}</td></tr>
        <tr><td>مرجع پرداخت</td><td>{{ $order->payment_reference }}</td></tr>
        <tr><td>مبلغ</td><td>{{ number_format($order->total_amount) }} تومان</td></tr>
    </table>

    <div class="hero-actions spaced-top">
        <a class="btn" href="{{ route('products.index') }}">بازگشت به فروشگاه</a>
        <a class="btn btn-outline" href="{{ route('contact') }}">ارتباط با پشتیبانی</a>
    </div>
</section>
@endsection
