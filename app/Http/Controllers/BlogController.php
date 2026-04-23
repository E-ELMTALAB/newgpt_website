<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'posts' => BlogPost::query()->whereRaw('"is_published" is true')->latest('published_at')->paginate(9),
        ]);
    }

    public function show(BlogPost $post)
    {
        abort_unless($post->is_published, 404);

        return view('blog.show', compact('post'));
    }
}
