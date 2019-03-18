<?php

namespace App\Http\Controllers\Articles;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Tags\Tag;

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
     * @todo Create route (view, backend)
     * @return Renderable
     */
    public function create(): Renderable
    {
       return view('categories.create');
    }
}
