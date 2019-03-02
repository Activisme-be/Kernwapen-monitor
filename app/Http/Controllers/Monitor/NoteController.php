<?php

namespace App\Http\Controllers\Monitor;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Monitor\NoteValidator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Notes;

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
     * Display view for creating a new note in the application.
     *
     * @param  City $city The database entity from the given city.
     * @return Renderable
     */
    public function create(City $city): Renderable
    {
        return view('monitor.notes.create', compact('city'));
    }

    /**
     * Method for storing a note for an city in the application.
     *
     * @param  NoteValidator    $input The form request class that handles the validation. 
     * @param  City             $city  The entity from the given city in the application.
     * @return RedirectResponse
     */
    public function store(NoteValidator $input, City $city): RedirectResponse
    {
        $note = (new Notes)->create($input->all());
        $authUser = auth()->user();

        if ($city->postal->notes()->save($note)) {
            $note->author()->associate($authUser)->save(); // Associate the authenticated user to the note. 
            $authUser->logActivity($note, 'Notities', "Heeft een notitie toegvoegd voor de stad {$city->naam}.");
        }

        return redirect()->route('monitor.notes', $city);
    }
}
