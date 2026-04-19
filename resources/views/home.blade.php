@extends('layouts.app')
@section('content')
<section class="hero">
    <h1>خرید مطمئن اکانت‌های دیجیتال و اشتراک هوش مصنوعی</h1>
    <p>{{ $siteSetting->homepage_intro ?? 'تحویل سریع، پشتیبانی واقعی و قیمت‌گذاری شفاف برای کسب‌وکارها و کاربران حرفه‌ای.' }}</p>
    <a class="btn" href="{{ route('products.index') }}">مشاهده محصولات</a>
</section>
<section>
    <h2>محصولات ویژه</h2>
    <div class="grid">@foreach($featuredProducts as $product)<article class="card">
        <h3><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h3>
        <p>{{ $product->short_description }}</p>
        <strong>{{ number_format($product->price) }} تومان</strong>
    </article>@endforeach</div>
</section>
<section><h2>دسته‌بندی‌ها</h2><div class="grid">@foreach($categories as $category)<a class="card" href="{{ route('products.category', $category) }}">{{ $category->name }}</a>@endforeach</div></section>
<section><h2>سوالات متداول</h2>@foreach($faqs as $faq)<details class="card"><summary>{{ $faq->question }}</summary><p>{{ $faq->answer }}</p></details>@endforeach</section>
<section><h2>آخرین مقالات</h2><div class="grid">@foreach($blogPosts as $post)<article class="card"><h3><a href="{{ route('blog.show',$post) }}">{{ $post->title }}</a></h3><p>{{ $post->excerpt }}</p></article>@endforeach</div></section>
@endsection
