<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        if ($page->is_published) {
            return view('page', compact('page'));
        } else {
            abort(404);
        }
    }
}
