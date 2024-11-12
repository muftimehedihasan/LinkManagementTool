<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Display a list of all links for the authenticated user
    public function index()
    {
        $links = Link::where('user_id', Auth::user()->id)->get();
        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['original_url' => 'required|url']);

        // dd($request->all()); // Check if original_url is present here

        $shortUrl = Str::random(6);

        Link::create([
            'original_url' => $request->original_url,
            'short_url' => $shortUrl,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('links.index')->with('success', 'Shortened URL created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        return view('links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $link->update([
            'original_url' => $request->original_url,
        ]);

        return redirect()->route('links.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index');
    }



    // Redirect to the original URL
    public function redirect($short_url)
    {
        $link = Link::where('short_url', $short_url)->firstOrFail();
        return redirect($link->original_url);
    }
}
