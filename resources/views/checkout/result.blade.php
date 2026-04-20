@extends('layouts.app')
@section('content')
<section class="panel" style="max-width:760px; margin-inline:auto;">
    <h1 style="margin:0 0 .65rem">سفارش شما با موفقیت ثبت شد ✅</h1>
    <p class="notice">تراکنش در حالت شبیه‌سازی‌شده تایید شد و سفارش برای تحویل آماده است.</p>

    <table class="table-lite" style="margin-top:1rem">
        <tr><td>شماره سفارش</td><td>{{ $order->order_number }}</td></tr>
        <tr><td>وضعیت</td><td>{{ $order->status }}</td></tr>
        <tr><td>مرجع پرداخت</td><td>{{ $order->payment_reference }}</td></tr>
        <tr><td>مبلغ</td><td>{{ number_format($order->total_amount) }} تومان</td></tr>
    </table>

    <div class="hero-actions" style="margin-top:1rem">
        <a class="btn" href="{{ route('products.index') }}">بازگشت به فروشگاه</a>
        <a class="btn btn-outline" href="{{ route('contact') }}">ارتباط با پشتیبانی</a>
    </div>
</section>
@endsection
