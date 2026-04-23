<article class="product-card home-product-card">
    <a href="{{ route('products.show', $product) }}" class="home-product-media" aria-label="{{ $product->name }}">
        @if($product->featured_image)
            <img src="{{ $product->featured_image }}" alt="{{ $product->name }}">
        @else
            <span class="home-product-media-fallback">{{ mb_substr($product->name, 0, 1) }}</span>
        @endif
    </a>

    <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>

    <div class="home-product-price-row">
        <span>شروع از</span>
        <strong>{{ number_format($product->price) }} تومان</strong>
    </div>

    <div class="home-product-meta-row">
        <span>اکانت اصلی</span>
        <span>تحویل سریع</span>
    </div>
</article>
