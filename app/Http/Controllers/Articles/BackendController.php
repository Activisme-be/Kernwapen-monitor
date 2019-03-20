<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Articles\PostValidator;

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
        $statusses = [0 => 'Klad versie', 1 => 'Publiceer bericht'];
        return view('articles.create', compact('statusses'));
    }

    /**
     * Method for storing a new article in the application. 
     * 
     * @todo implement route (view, backend)
     * 
     * @param 
     * @param 
     * @return 
     */
    public function store(PostValidator $input, Article $article): RedirectResponse 
    {
        dd($input->all()); //! Only for debugging
    }
}
