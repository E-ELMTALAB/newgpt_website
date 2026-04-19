@extends('layouts.app')
@section('content')
<h1>نتیجه پرداخت</h1>
<div class="card">
<p>شماره سفارش: {{ $order->order_number }}</p>
<p>وضعیت: {{ $order->status }}</p>
<p>مرجع پرداخت: {{ $order->payment_reference }}</p>
<p>مبلغ: {{ number_format($order->total_amount) }} تومان</p>
</div>
@endsection
