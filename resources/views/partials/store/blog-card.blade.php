<article class="blog-card">
    <span class="badge">{{ optional($post->published_at)->format('Y/m/d') }}</span>
    <h3><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
    <p>{{ $post->excerpt }}</p>
    <div class="card-meta">
        <span class="badge badge-ok">راهنمای خرید</span>
        <a class="btn btn-sm btn-outline" href="{{ route('blog.show', $post) }}">ادامه</a>
    </div>
</article>
