<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function shorten()
    {
        return view('urls.shorten');
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $shortUrl = Str::random(6);
        $user = Auth::user();

        $url = Url::create([
            'long_url' => $request->input('long_url'),
            'short_url' => $shortUrl,
            'user_id' => $user ? $user->id : null,
        ]);

        return redirect()->route('shorten.statistics');
    }

    public function redirect($shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->firstOrFail();
        $url->increment('clicks');

        return redirect($url->long_url);
    }
    public function statistics()
    {
        $user = Auth::user();
        $urls = $user->urls;
        return view('urls.statistics', compact('urls'));
    }
}
