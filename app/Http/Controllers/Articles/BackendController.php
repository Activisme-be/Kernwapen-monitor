<?php

namespace App\Http\Controllers\Articles;

use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;
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
     * @see \App\Observers\ArticleObserver::created()
     * 
     * @param  PostValidator    $input    The valiodation class entity that handles all the validation. 
     * @param  Article          $article  The database model instance for the news articles.
     * @return RedirectResponse
     */
    public function store(PostValidator $input, Article $article): RedirectResponse 
    {
        if ($article = $article->create($input->all())) {
            auth()->user()->logActivity($article, 'Nieuwsberichten', 'Heeft een nieuws bericht toegevoegd in de applicatie.');
            flash('Het nieuwsbericht is toegevoegd in de applicatie.')->success();
        }

        return redirect()->route('articles.dashboard');
    }

    /**
     * Method to publish an article in the application. 
     * 
     * @todo Register route
     * 
     * @param  Article $article The database entity from the given database article.
     * @return RedirectResponse
     */
    public function publish(Article $article): RedirectResponse 
    {
        if ($article->isDraft() && $article->update(['status' => true])) {
            flash('Het nieuwsbericht is gepubliceerd.')->info();
            auth()->user()->logActivity($article, 'Nieuwsberichten', 'Heeft een nieuwsbericht gepubliceerd.');
        } 

        return redirect()->route('articles.dashboard');
    }

    /**
     * Method for registering news articles as draft.
     * 
     * @param  Article $article The database entity from the given database article.
     * @return RedirectResponse
     */
    public function unpublish(Article $article): RedirectResponse 
    {
        if ($article->isPublished() && $article->update(['status' => false])) {
            flash('Het nieuwsbericht is geregistreerd als een kladwerk.')->info();
            auth()->user()->logActivity($article, 'Nieuwsberichten', 'Heeft een nieuwsbericht geregistreerd als klad.');
        }

        return redirect()->route('articles.dashboard');
    }
}
