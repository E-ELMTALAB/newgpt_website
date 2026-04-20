@extends('layouts.app')
@section('content')
<section class="details-grid">
    <article class="panel">
        <h1 style="margin:0 0 .4rem">سبد خرید</h1>
        <p>در این نسخه نمایشی، سبد خرید از محصولات پیشنهادی پر شده است.</p>

        <div class="stack" style="margin-top:1rem">
            @forelse($cartProducts as $product)
                <article class="panel" style="background:rgba(255,255,255,.05)">
                    <div class="card-meta" style="margin:0; padding-top:0; border-top:0">
                        <div>
                            <strong>{{ $product->name }}</strong>
                            <p style="margin:0">{{ $product->short_description }}</p>
                        </div>
                        <span class="badge">۱ عدد</span>
                    </div>
                    <div class="card-meta">
                        <div class="price-row"><strong>{{ number_format($product->price) }} تومان</strong></div>
                        <a class="btn btn-sm btn-outline" href="{{ route('products.show', $product) }}">ویرایش</a>
                    </div>
                </article>
            @empty
                <p>محصولی در سبد نیست.</p>
            @endforelse
        </div>
    </article>

    <aside class="panel">
        <h2 style="margin:0 0 .5rem">خلاصه سفارش</h2>
        @php($total = $cartProducts->sum('price'))
        <table class="table-lite">
            <tr><td>جمع محصولات</td><td>{{ number_format($total) }} تومان</td></tr>
            <tr><td>هزینه ارسال</td><td>رایگان</td></tr>
            <tr><td>مجموع قابل پرداخت</td><td><strong>{{ number_format($total) }} تومان</strong></td></tr>
        </table>

        @if($cartProducts->first())
            <a class="btn" style="margin-top:1rem; width:100%" href="{{ route('checkout.show', $cartProducts->first()) }}">ادامه و پرداخت</a>
        @endif
    </aside>
</section>
@endsection
