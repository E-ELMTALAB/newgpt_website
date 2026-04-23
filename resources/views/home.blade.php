@extends('layouts.app')
@section('content')
<section class="home-layout">
    <section class="home-top-banner panel" aria-label="اطلاعیه">
        <p>تحویل سریع اکانت‌ها، پشتیبانی واقعی و پرداخت امن در تمام مراحل خرید.</p>
    </section>

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

            <div class="home-intro-text">
                <h1>خرید اکانت‌های هوش مصنوعی</h1>
                <p>{{ optional($siteSetting)->homepage_intro ?: 'هوش مصنوعی به بخش‌های مختلف زندگی ما نفوذ کرده و استفاده از آن در سرعت انجام کار، کاهش هزینه‌ها و رسیدن به خروجی حرفه‌ای نقش مهمی دارد. با انتخاب سرویس مناسب، در کوتاه‌ترین زمان به ابزارهای قدرتمند دسترسی خواهید داشت.' }}</p>
                <p>نامبیرلند به‌عنوان مرجع اکانت‌های هوش مصنوعی، اشتراک‌های معتبر و باکیفیت را با قیمت رقابتی ارائه می‌کند تا بتوانید با خیال راحت از سرویس مدنظر خود استفاده کنید.</p>
            </div>
        </div>
    </section>

    <section class="home-products-flow">
        <div class="section-head home-section-head">
            <h2>محصولات بر اساس دسته‌بندی</h2>
            <a class="btn btn-ghost btn-sm" href="{{ route('products.index') }}">نمایش صفحه فروشگاه</a>
        </div>

        @php($groupedProducts = $products->getCollection()->groupBy('category_id'))
        @forelse($groupedProducts as $items)
            @php($groupCategory = optional($items->first()->category)->name ?? 'سایر محصولات')
            <section class="home-product-group">
                <div class="home-product-group-head">
                    <h3>{{ $groupCategory }}</h3>
                </div>
                <section class="grid-cards home-group-grid">
                    @foreach($items as $product)
                        @include('partials.store.product-card', ['product' => $product])
                    @endforeach
                </section>
            </section>
        @empty
            <article class="panel">محصولی برای نمایش ثبت نشده است.</article>
        @endforelse

        <div class="spaced-top">{{ $products->links() }}</div>
    </section>

    <section class="home-faq">
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
