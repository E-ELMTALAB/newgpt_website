@extends('layouts.app')
@section('content')
<section class="home-layout">
    <section class="home-top-banner panel" aria-label="اطلاعیه">
        <p>تحویل سریع اکانت‌ها، پشتیبانی واقعی و پرداخت امن در تمام مراحل خرید.</p>
    </section>

    <section class="home-tabs-strip" aria-label="دسته‌بندی‌ها">
        @foreach($homeSections as $section)
            <a
                href="{{ route('home', ['section' => $section['key']]) }}"
                class="home-tab-chip {{ $currentSection === $section['key'] ? 'is-active' : '' }} {{ $section['key'] === 'payments' ? 'is-glow' : '' }}"
            >
                @if($section['key'] === 'payments')
                    <span class="home-tab-badge">ویژه</span>
                @endif
                <span>{{ $section['label'] }}</span>
            </a>
        @endforeach
    </section>

    <section class="home-main-shell panel">
        <section class="home-intro">
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
            <section class="grid-cards">
                @forelse($products as $product)
                    @include('partials.store.product-card', ['product' => $product, 'homeCard' => true])
                @empty
                    <article class="panel">محصولی برای نمایش ثبت نشده است.</article>
                @endforelse
            </section>
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
</section>
@endsection
