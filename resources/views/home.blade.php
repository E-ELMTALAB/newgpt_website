@extends('layouts.app')
@section('content')
<section class="hp-layout-shell">
    <nav class="hp-tabs" aria-label="دسته‌بندی سریع">
        <a href="#" class="hp-tab">شماره مجازی</a>
        <a href="#" class="hp-tab hp-tab-active">اکانت هوش مصنوعی</a>
        <a href="#" class="hp-tab hp-tab-new">کارت اعتباری</a>
        <a href="#" class="hp-tab">گیفت کارت</a>
        <a href="#" class="hp-tab">اکانت پریمیوم</a>
        <a href="#" class="hp-tab">سیم کارت</a>
    </nav>

    <section class="hp-intro panel">
        <div class="hp-intro-media">
            <div class="hp-video-card">
                <span class="hp-video-time">00:41</span>
                <button type="button" aria-label="پخش ویدیو" class="hp-video-play">▶</button>
            </div>
        </div>
        <div class="hp-intro-copy">
            <h1>خرید اکانت‌های هوش مصنوعی</h1>
            <p>
                هوش مصنوعی به بخش‌های مختلف زندگی ما نفوذ کرده؛ طوری که استفاده از آن اجتناب‌ناپذیر شده و از طرفی مزایای زیادی هم دارد.
                مثل سرعت بخشیدن به انجام کار، ارائه خروجی حرفه‌ای یا کاهش هزینه‌ها.
                با وجود چنین شرایطی برای اینکه از دنیای تکنولوژی عقب نمانید و از این فناوری قدرتمند بهره‌مند شوید،
                خرید اکانت هوش مصنوعی به‌عنوان یک دستیار حرفه‌ای الزامی‌ست.
            </p>
            <p>
                با انتخاب سرویس مورد نظر خود در همین صفحه، دسترسی به بهترین ابزارهای هوش مصنوعی را در کمترین زمان خواهید داشت.
            </p>
        </div>
    </section>

    <section class="hp-grid-block">
        <header class="hp-grid-head">
            <h2>هوش مصنوعی کاربردی</h2>
        </header>

        <div class="hp-tools-grid">
            @foreach($gridProducts as $product)
                <article class="hp-tool-card">
                    <a href="{{ route('products.show', $product) }}" class="hp-tool-cover" @if($product->featured_image)style="background-image:url('{{ $product->featured_image }}')"@endif>
                        @unless($product->featured_image)
                            <span>{{ mb_substr($product->name, 0, 2) }}</span>
                        @endunless
                    </a>
                    <div class="hp-tool-body">
                        <h3 title="{{ $product->name }}">{{ $product->name }}</h3>
                        <p>
                            <span>قیمت از:</span>
                            <strong>{{ number_format($product->price) }}</strong>
                            <span>تومان</span>
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="hp-faq-panel panel">
        @foreach($faqs as $faq)
            <details class="hp-faq-row" @if($loop->first)open@endif>
                <summary>
                    <span class="hp-faq-icon">✓</span>
                    <strong>{{ $faq->question }}</strong>
                </summary>
                <p>{{ $faq->answer }}</p>
            </details>
        @endforeach
    </section>
</section>
@endsection
