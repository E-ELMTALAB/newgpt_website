@extends('layouts.app')
@section('content')
<section class="home-layout">
    <section class="home-tabs-strip" aria-label="دسته‌بندی‌ها">
        @php($homeTopLinks = [
            ['label' => 'پرداخت ارزی', 'url' => '/services/international-payments'],
            ['label' => 'اکانت های هوش مصنوعی', 'url' => '/account/artificial-inteligence'],
            ['label' => 'خدمات ویژه', 'url' => '/services/premium'],
            ['label' => 'اشتراک تیمی', 'url' => '/services/team-plans'],
            ['label' => 'راهنما', 'url' => '/guides'],
            ['label' => 'تماس با ما', 'url' => '/contact'],
        ])
        @foreach($homeTopLinks as $link)
            <a href="{{ $link['url'] }}" class="home-tab-chip {{ $loop->first ? 'is-active' : '' }}">
                @if($loop->first)
                    <span class="home-tab-badge">جدید</span>
                @endif
                <span>{{ $link['label'] }}</span>
            </a>
        @endforeach
    </section>

    <section class="home-intro panel">
        <div class="home-intro-grid">
            <div class="home-intro-text">
                <h1>خرید اکانت‌های هوش مصنوعی</h1>
                <p>{{ optional($siteSetting)->homepage_intro ?: 'هوش مصنوعی به بخش‌های مختلف زندگی ما نفوذ کرده و استفاده از آن در سرعت انجام کار، کاهش هزینه‌ها و رسیدن به خروجی حرفه‌ای نقش مهمی دارد. با انتخاب سرویس مناسب، در کوتاه‌ترین زمان به ابزارهای قدرتمند دسترسی خواهید داشت.' }}</p>
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
            <h2>همه محصولات</h2>
            <a class="btn btn-ghost btn-sm" href="{{ route('products.index') }}">نمایش صفحه فروشگاه</a>
        </div>

        <nav class="chips" aria-label="دسته‌بندی محصولات">
            <a class="active" href="{{ route('products.index') }}">همه</a>
            @foreach($categories as $category)
                <a href="{{ route('products.category', $category) }}">{{ $category->name }}</a>
            @endforeach
        </nav>

        <section class="grid-cards">
            @forelse($products as $product)
                @include('partials.store.product-card', ['product' => $product])
            @empty
                <article class="panel">محصولی برای نمایش ثبت نشده است.</article>
            @endforelse
        </section>

        <div class="spaced-top">{{ $products->links() }}</div>
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
