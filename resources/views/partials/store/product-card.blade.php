<article class="product-card">
    @if(!empty($product->badge_text))
        <span class="badge badge-sale">{{ $product->badge_text }}</span>
    @else
        <span class="badge">{{ $product->category?->name ?? 'محصول دیجیتال' }}</span>
    @endif

    <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
    <p>{{ $product->short_description }}</p>

    <div class="card-meta">
        <div class="price-row">
            <strong>{{ number_format($product->price) }} تومان</strong>
            @if($product->compare_price)
                <del>{{ number_format($product->compare_price) }}</del>
            @endif
        </div>
        <a class="btn btn-sm" href="{{ route('products.show', $product) }}">جزئیات</a>
    </div>
</article>
