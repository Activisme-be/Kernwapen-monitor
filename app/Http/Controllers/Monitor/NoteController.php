<?php

namespace App\Http\Controllers\Monitor;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class NoteController
 * 
 * @package App\Http\Controller\Monitor
 */
class NoteController extends Controller
{
    /**
     * NoteController constructor 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
    }

    /**
     * Display all the notes from the given city. 
     * 
     * @param  City $city   The database entity from the given city
     * @return Renderable
     */
    public function index(City $city): Renderable
    {
        $notes = $city->postal->notes()->simplePaginate();
        return view('monitor.notes.index', compact('city', 'notes'));
    }

    /**
     * 
     */
    public function create(City $city): Renderable 
    {
        return view('monitor.notes.create', compact('city'));
    }
}
