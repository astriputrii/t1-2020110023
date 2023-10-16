<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $articles = Article::query()->latest()->paginate(7);
        return view('landing', compact('articles'));
    }
}
