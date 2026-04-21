<?php

namespace App\Http\Controllers;

use App\Models\ContactMethod;

class ContactController extends Controller
{
    public function __invoke()
    {
        return view('contact', [
            'methods' => ContactMethod::query()->whereTrue('is_active')->orderBy('sort_order')->get(),
        ]);
    }
}
