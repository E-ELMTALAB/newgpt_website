@if(!empty($homeCard))
    <article class="product-card home-ref-card">
        <a href="{{ route('products.show', $product) }}" class="home-ref-media" aria-label="{{ $product->name }}">
            @if($product->featured_image)
                <img src="{{ $product->featured_image }}" alt="{{ $product->name }}">
            @else
                <span class="home-ref-media-fallback">{{ mb_substr($product->name, 0, 1) }}</span>
            @endif

            @if(!empty($product->badge_text))
                <span class="home-ref-badge">{{ $product->badge_text }}</span>
            @endif
        </a>

        <div class="home-ref-info">
            <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>

            <div class="home-ref-price">
                @if($product->compare_price)
                    <del>{{ number_format($product->compare_price) }} تومان</del>
                @endif
                <strong>{{ number_format($product->price) }} تومان</strong>
            </div>

            <a class="btn btn-sm home-ref-cta" href="{{ route('products.show', $product) }}">مشاهده</a>
        </div>
    </article>
@else
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
@endif
