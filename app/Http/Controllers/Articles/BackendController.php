<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class BackendController
 *
 * @package App\Http\Controllers\Articles
 */
class BackendController extends Controller
{
    /**
     * BackendController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin|writer', 'forbid-banned-user']);
    }

    /**
     * Display the admin overview page for the news articles.
     *
     * @param  Article $articles The model instance for the news articles.
     * @return Renderable
     */
    public function index(Article $articles): Renderable
    {
        return view('articles.backend-overview', ['articles' => $articles->simplePaginate()]);
    }

    /**
     * Method for displaying the create page for an news article.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('articles.create');
    }
}
