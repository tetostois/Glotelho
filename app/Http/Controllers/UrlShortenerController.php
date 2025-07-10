<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\Click;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    // POST /api/shorten
    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        // Générer un code court unique
        do {
            $shortCode = Str::random(6);
        } while (Url::where('short_code', $shortCode)->exists());

        $url = Url::create([
            'original_url' => $request->url,
            'short_code' => $shortCode,
        ]);

        return response()->json([
            'short_url' => url($shortCode),
            'original_url' => $url->original_url,
            'short_code' => $url->short_code,
        ]);
    }

    // GET /{short_code}
    public function redirect($short_code)
    {
        $url = Url::where('short_code', $short_code)->first();
        if (!$url) {
            return response()->view('errors.404', [], 404);
        }

        // Incrémenter le compteur
        $url->increment('click_count');
        // Enregistrer le clic
        Click::create([
            'url_id' => $url->id,
            'clicked_at' => now(),
        ]);

        return redirect($url->original_url);
    }

    // GET /api/stats/{short_code}
    public function stats($short_code)
    {
        $url = Url::where('short_code', $short_code)->first();
        if (!$url) {
            return response()->json(['error' => 'Short code not found'], 404);
        }

        return response()->json([
            'original_url' => $url->original_url,
            'short_code' => $url->short_code,
            'click_count' => $url->click_count,
            'created_at' => $url->created_at,
        ]);
    }
} 