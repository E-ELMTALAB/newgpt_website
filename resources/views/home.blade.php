@extends('layouts.app')
@section('content')
<section class="hp-hero glass">
    <div class="hp-hero-aura" aria-hidden="true"></div>
    <div class="hp-hero-inner">
        <span class="hp-pill">● پلتفرم پیشرو در هوش مصنوعی</span>
        <h1>خرید اکانت ChatGPT</h1>
        <p>اکانت‌های قانونی ChatGPT با تحویل آنی، اتصال پایدار و پشتیبانی واقعی برای تجربه‌ای بدون دغدغه.</p>

        <div class="hp-trust-icons">
            <article>
                <div class="hp-trust-icon">↻</div>
                <strong>تضمین تعویض</strong>
            </article>
            <article>
                <div class="hp-trust-icon">🛡</div>
                <strong>اکانت‌های اصل</strong>
            </article>
            <article>
                <div class="hp-trust-icon">◷</div>
                <strong>پشتیبانی ۲۴/۷</strong>
            </article>
        </div>

        <a class="btn hp-main-cta" href="{{ route('products.index') }}">مشاهده محصولات ←</a>
    </div>
</section>

<section class="section-head hp-tight-head hp-section">
    <div>
        <h2>محصولات منتخب</h2>
        <p>پرفروش‌ترین محصولات ما</p>
    </div>
</section>

<section class="hp-product-grid hp-section">
    @forelse($featuredProducts as $product)
        <article class="hp-product-card">
            <a href="{{ route('products.show', $product) }}" class="hp-product-media" @if($product->featured_image)style="background-image:url('{{ $product->featured_image }}')"@endif>
                @if($product->compare_price && $product->compare_price > $product->price)
                    @php($off = round((($product->compare_price - $product->price) / $product->compare_price) * 100))
                    <span class="hp-off-badge">{{ $off }}٪ تخفیف</span>
                @endif
                @unless($product->featured_image)
                    <span class="hp-product-fallback">{{ mb_substr($product->name, 0, 2) }}</span>
                @endunless
            </a>
            <div class="hp-product-body glass">
                <h3 title="{{ $product->name }}">{{ $product->name }}</h3>
                <div class="hp-price-line">
                    @if($product->compare_price)
                        <del>{{ number_format($product->compare_price) }} تومان</del>
                    @endif
                    <strong>{{ number_format($product->price) }}</strong>
                    <span>تومان</span>
                </div>
                <a class="btn btn-outline btn-sm" href="{{ route('products.show', $product) }}">مشاهده</a>
            </div>
        </article>
    @empty
        <article class="panel">محصول ویژه‌ای ثبت نشده است.</article>
    @endforelse
</section>

<section class="hp-editorials hp-section">
    @foreach($categories->take(2) as $category)
        <a href="{{ route('products.category', $category) }}" class="hp-editorial-card">
            <div class="hp-editorial-overlay"></div>
            <div class="hp-editorial-content">
                <h3>{{ $loop->first ? 'AI های تولید محتوا' : 'AI Chatbots' }}</h3>
                <p>{{ $loop->first ? 'هوش مصنوعی‌هایی که برای تولید عکس و فیلم نیاز دارید' : 'تمام چت‌بات‌هایی که نیاز دارید' }}</p>
                <span class="hp-editorial-cta">مشاهده →</span>
            </div>
        </a>
    @endforeach
</section>

<section class="section-head hp-tight-head hp-section">
    <div>
        <h2>پرفروش‌ترین محصولات سوشیال مدیا</h2>
        <p>اکانت‌های اینستاگرام، تیک‌تاک، تلگرام و بیشتر</p>
    </div>
</section>

<section class="grid-cards hp-section">
    @foreach($socialProducts as $product)
        @include('partials.store.product-card', ['product' => $product])
    @endforeach
</section>

<section class="hp-trust-metrics hp-section">
    <article><strong>+۱۰,۰۰۰</strong><span>کاربر فعال</span></article>
    <article><strong>۳+ سال</strong><span>تجربه در هوش مصنوعی</span></article>
    <article><strong>۱۰۰٪</strong><span>امنیت پرداخت تضمینی</span></article>
</section>

<section class="hp-reassure hp-section">
    <article>تحویل آنی و فعال‌سازی کمتر از ۳۰ دقیقه</article>
    <article>گارانتی تعویض اکانت در صورت مشکل</article>
    <article>مشاوره قبل از خرید برای انتخاب پلن مناسب</article>
</section>

<section class="hp-mid-cta hp-section panel">
    <h3>برای انتخاب بهترین پلن نیاز به راهنمایی دارید؟</h3>
    <p>تیم پشتیبانی در تمام مراحل خرید و فعال‌سازی کنار شماست.</p>
    <a class="btn" href="{{ route('contact') }}">گفتگو با پشتیبانی</a>
</section>

<section class="seo-content-card panel hp-section" data-collapsible>
    <div class="seo-content" data-collapsible-content>
        <h3>راهنمای خرید اکانت ChatGPT و اشتراک‌های دیجیتال</h3>
        <p>انتخاب پلن مناسب اولین قدم برای استفاده حرفه‌ای است. پلن‌های اشتراکی برای شروع سریع و اقتصادی عالی هستند، و پلن‌های اختصاصی برای تیم‌ها و کاربران حرفه‌ای مناسب‌ترند.</p>
        <p>پس از خرید، اطلاعات اکانت سریع ارسال می‌شود و تیم پشتیبانی تا فعال‌سازی کامل همراه شماست. اگر نیاز به تعویض یا راهنمایی داشته باشید، فرآیند کاملاً شفاف و قابل پیگیری است.</p>
        <p>اگر بین چند سرویس مردد هستید، از مشاوره رایگان قبل از خرید استفاده کنید تا بر اساس بودجه، نوع استفاده و میزان مصرف بهترین انتخاب را داشته باشید.</p>
    </div>
    <button class="btn btn-ghost btn-sm" type="button" data-collapsible-toggle>مشاهده توضیحات کامل</button>
</section>

<section class="section-head hp-tight-head hp-section">
    <h2>سوالات متداول</h2>
</section>
<section class="faq-stack stack hp-section hp-faq">
    @foreach($faqs as $faq)
        <details>
            <summary>{{ $faq->question }}</summary>
            <p>{{ $faq->answer }}</p>
        </details>
    @endforeach
</section>

<section class="section-head hp-tight-head hp-section">
    <div>
        <h2>مقالات</h2>
        <p>راهنماهای آموزشی و مقایسه سرویس‌ها</p>
    </div>
    <a class="btn btn-ghost" href="{{ route('blog.index') }}">مشاهده همه</a>
</section>
<section class="grid-cards hp-section">
    @foreach($blogPosts as $post)
        @include('partials.store.blog-card', ['post' => $post])
    @endforeach
</section>
@endsection
