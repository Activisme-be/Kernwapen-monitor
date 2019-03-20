<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tags;
use App\Models\Article;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\Articles
 */
class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
    }

    /**
     * Admin dashboard page for the news articles.
     *
     * @param  Tag $categories The database model instance from the categories
     * @return Renderable
     */
    public function dashboard(Tag $categories): Renderable
    {
        return view('categories.dashboard', ['categories' => $categories->simplePaginate()]);
    }

    /**
     * Method for displaying the create view for an news category.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
       return view('categories.create');
    }
  
    /**
     * Method for storing the news category in the database storage.
     *
     * @param  Request $input The form request class that holds all the request data.
     * @return RedirectResponse
     */
    public function store(Request $input): RedirectResponse
    {
        $input->validate(['naam' => ['required', 'string', 'unique:tags,name', 'max:191']]);

        if ($category = Tags::findOrCreate($input->naam, 'news-category')) {
            auth()->user()->logActivity($category, 'Categorieen', "Heeft de categorie tag {$category->name} toegevoegd");
            flash("De nieuws categorie is aangemaakt in de applicatie")->success();
        }

        return redirect()->route('categories.dashboard');
    }

    /**
     * Method for displaying and update view for the given tag in the application. 
     * 
     * @todo Register route (backend, view)
     * 
     * @param  Tags    $tag         The database entitiy from the given category tag.
     * @param  Article $articles    The database model for all the news categories
     * @return Renderable
     */
    public function show(Tags $tag, Article $articles): Renderable
    {
        $items = $articles->withAnyTags([$tag->name], 'news-category')->simplePaginate();
        return view('categories.show', compact('tag', 'items'));
    }

    /**
     * Method for deleting a category tag in the application. 
     * 
     * @see \App\Observers\TagsObserver::created() <- Relation fills for the category tag
     * 
     * @param  Tags $tag The database entity from the category tag. 
     * @return RedirectResponse 
     */
    public function destroy(Tags $tag): RedirectResponse
    {
        if ($tag->delete()) {
            auth()->user()->logActivity($tag, 'Categorieen', "Heeft de nieuws categorie {$tag->name} verwijderd.");
            flash("De nieuws categorie <strong>{$tag->name}</strong> is verwijderd in de applicatie.")->success();
        }

        return redirect()->route('categories.dashboard');
    }
}
