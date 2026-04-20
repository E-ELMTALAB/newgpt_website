@extends('layouts.app')
@section('content')
<section class="home-layout">
    <section class="home-tabs-strip" aria-label="دسته‌بندی‌ها">
        @foreach($categories->take(6) as $category)
            <a href="{{ route('products.category', $category) }}" class="home-tab-chip {{ $loop->first ? 'is-active' : '' }}">
                @if($loop->first)
                    <span class="home-tab-badge">جدید</span>
                @endif
                <span>{{ $category->name }}</span>
            </a>
        @endforeach
    </section>

    <section class="home-intro panel">
        <div class="home-intro-grid">
            <div class="home-intro-text">
                <h1>خرید اکانت‌های هوش مصنوعی</h1>
                <p>{{ $siteSetting->homepage_intro ?: 'هوش مصنوعی به بخش‌های مختلف زندگی ما نفوذ کرده و استفاده از آن در سرعت انجام کار، کاهش هزینه‌ها و رسیدن به خروجی حرفه‌ای نقش مهمی دارد. با انتخاب سرویس مناسب، در کوتاه‌ترین زمان به ابزارهای قدرتمند دسترسی خواهید داشت.' }}</p>
                <p>نامبیرلند به‌عنوان مرجع اکانت‌های هوش مصنوعی، اشتراک‌های معتبر و باکیفیت را با قیمت رقابتی ارائه می‌کند تا بتوانید با خیال راحت از سرویس مدنظر خود استفاده کنید.</p>
            </div>

            <div class="home-intro-media">
                <div class="home-media-frame">
                    @php($introProduct = $featuredProducts->first())
                    @if($introProduct && $introProduct->featured_image)
                        <img src="{{ $introProduct->featured_image }}" alt="{{ $introProduct->name }}">
                    @else
                        <div class="home-media-placeholder">
                            هر چی وایسادیم کسی درو باز نکرد، دوباره زنگ بزن.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="home-products-section">
        <div class="section-head home-section-head">
            <h2>هوش مصنوعی کاربردی</h2>
        </div>

        <div class="home-products-grid">
            @forelse($featuredProducts->take(15) as $product)
                <article class="home-product-card">
                    <a href="{{ route('products.show', $product) }}" class="home-product-cover">
                        @if($product->featured_image)
                            <img src="{{ $product->featured_image }}" alt="{{ $product->name }}">
                        @else
                            <span>{{ mb_substr($product->name, 0, 2) }}</span>
                        @endif
                    </a>
                    <div class="home-product-body">
                        <h3>{{ $product->name }}</h3>
                        <div class="home-product-price">
                            <span>قیمت از:</span>
                            <strong>{{ number_format($product->price) }}</strong>
                            <small>تومان</small>
                        </div>
                    </div>
                </article>
            @empty
                <article class="panel">محصولی برای نمایش ثبت نشده است.</article>
            @endforelse
        </div>
    </section>

    <section class="home-faq panel">
        <div class="section-head home-section-head">
            <h2>سوالات متداول</h2>
        </div>

        <div class="home-faq-list">
            @foreach($faqs->take(4) as $faq)
                <details>
                    <summary>
                        <span class="home-faq-icon">✓</span>
                        <span>{{ $faq->question }}</span>
                    </summary>
                    <p>{{ $faq->answer }}</p>
                </details>
            @endforeach
        </div>
    </section>
</section>
@endsection
