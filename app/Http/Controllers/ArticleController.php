<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$articles = Article::all();
        $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|string|min:13|max:13',
            'judul'=> 'required|string',
        ]);

        $article = Article::create([
            'isbn' => $validated['isbn'],
            'judul' => $validated['judul'],
            'publish_at' => $request->has('is_published') ? Carbon::now() : null,
        ]);
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('image')->store('public/images');

            $validated['image'] = $imagePath;
        }

        $article = Article::create([
            'isbn' => $validated['isbn'],
            'judul' => $validated['judul'],
            'published_at' => $request->has('is_published') ? Carbon::now() : false,
            'image' => $validated['image'] ?? null,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
