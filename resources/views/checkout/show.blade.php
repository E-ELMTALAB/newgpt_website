@extends('layouts.app')
@section('content')
<h1>تسویه حساب</h1>
<div class="card">
<p>محصول: {{ $product->name }}</p>
<p>مبلغ نهایی: <strong>{{ number_format($product->price) }} تومان</strong></p>
<form method="post" action="{{ route('checkout.store',$product) }}" class="form">@csrf
<input name="customer_name" placeholder="نام و نام خانوادگی" required>
<input name="customer_email" type="email" placeholder="ایمیل" required>
<input name="customer_phone" placeholder="شماره موبایل" required>
<textarea name="notes" placeholder="توضیحات (اختیاری)"></textarea>
<button class="btn" type="submit">پرداخت و ثبت سفارش</button>
</form>
</div>
@endsection
