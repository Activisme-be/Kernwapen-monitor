<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Article;
use App\Models\Tags;

/**
 * Class FrontendController 
 * 
 * @package App\Http\Controllers\Articles
 */
class FrontendController extends Controller
{
    /**
     * Method for displaying the frontend index page for the news articles. 
     * 
     * @return Renderable
     */
    public function index(): Renderable
    {
        $articles   = Article::whereStatus(true)->latest()->simplePaginate(5);
        $categories = Tags::orderBy('views', 'DESC')->take(12)->get();

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show(Article $article): Renderable 
    {
        return view('articles.show', compact('article'));
    }
}
