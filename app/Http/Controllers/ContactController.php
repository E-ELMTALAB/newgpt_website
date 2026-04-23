<?php

namespace App\Http\Controllers;

use App\Models\ContactMethod;

class ContactController extends Controller
{
    public function __invoke()
    {
        return view('contact', [
            'methods' => ContactMethod::query()->whereRaw('"is_active" is true')->orderBy('sort_order')->get(),
        ]);
    }
}
