<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tags;

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
     * @param  Tags $categories The database model instance from the categories
     * @return Renderable
     */
    public function dashboard(Tags $categories): Renderable
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
        // TODO: We need to look if it is needed for refactor this in Form Request class
        $input->validate(['naam' => ['required', 'string', 'unique:tags,name', 'max:191']]);

        if ($category = Tags::findOrCreate($input->naam, 'news-category')) {
            // TODO: Implement activity log for the handling
            // TODO: Implement create observer for setting the author relation.
            flash("De nieuws categorie is aangemaakt in de applicatie")->success();
        }

        return redirect()->route('categories.dashboard');
    }
}
