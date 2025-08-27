<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,Str;
use App\Models\{ShortUrl};

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authUser = Auth::user();

        if($authUser->role_id == 1){
            $urls = ShortUrl::with(['user','company'])->paginate(10);
        } elseif ($authUser->role_id == 2) {
            $urls = ShortUrl::with(['user','company'])->where('company_id', $authUser->company_id)->paginate(10);
        } else {
            $urls = ShortUrl::with(['user','company'])->where('user_id', $authUser->id)->paginate(10);
        }

        return view('short_url.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('short_url.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $authUser = Auth::user();

        if ($authUser->role_id === 1) {
            abort(403, 'SuperAdmin cannot create short URLs');
        }

        $shortCode = Str::random(6);

        ShortUrl::create([
            'company_id' => $authUser->company_id,
            'user_id' => $authUser->id,
            'original_url' => $request->url,
            'short_code' => $shortCode
        ]);
        
        return redirect()->route('short-urls.index')->with('success', 'Short URL created successfully!');
    }

    public function redirect($short_code)
    {
        $shortUrl = ShortUrl::where('short_code', $short_code)->firstOrFail();
        return redirect()->away($shortUrl->original_url);
    }
}
