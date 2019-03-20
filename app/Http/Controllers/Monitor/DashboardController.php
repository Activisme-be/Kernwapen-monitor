<?php

namespace App\Http\Controllers\Monitor;

use App\Models\City;
use App\Models\Signature;
use App\Models\Province;
use App\Http\Requests\Monitor\InformationValidator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class DashboardController
 * 
 * @package App\Http\Controllers\Monitor
 */
class DashboardController extends Controller
{
    /**
     * Create a new DashboardController instance. 
     * 
     * @return void 
     */
    public function __construct() 
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
    }

    /**
     * Method for the monitor backend view. 
     *
     * @todo Register route
     *
     * @param  Request   $request       The form request class that holds all the request information
     * @param  City      $cities        The database model class for the cities
     * @param  Signature $signatures    The database model class for the petition signatures.
     * @return Renderable 
     */
    public function dashboard(Request $request, City $cities, Signature $signatures): Renderable
    {
        return view('monitor.dashboard', [
            'cities'     => $cities->simplePaginate(), 
            'cityCount'  => str_replace(',', '.', number_format($cities->count())),
            'signatures' => str_replace(',', '.', number_format($signatures->count()))
        ]);
    }

    /**
     * Method for search trough the cities in the monitor.
     *
     * @param  Request   $request       The form request class that collects all the request information.
     * @param  Signature $signatures    The database model class for the petition signatures
     * @param  City      $cities        The database model class for the cities.
     * @return Renderable
     */
    public function dashboardSearch(Request $request, Signature $signatures, City $cities): Renderable
    {
        return view('monitor.dashboard', [
            'cities'     => $cities->getSearchResults($request->term)->simplePaginate(),
            'cityCount'  => str_replace(',', '.', number_format($cities->count())),
            'signatures' => str_replace(',', '.', number_format($signatures->count()))
        ]);
    }

    /**
     * Method for displaying all the information about the given city. 
     * 
     * @param  City     $city       The database model entity from the given city.
     * @param  Province $provinces  The database model class for the provinces.
     * @return Renderable
     */
    public function show(City $city, Province $provinces): Renderable 
    {
        $provinces = $provinces->all();
        return view('monitor.show', compact('city', 'provinces'));
    }

    /**
     * Method for updating the city information in the application. 
     * 
     * @param  InformationValidator $input  The request class that handles the validation.
     * @param  City                 $city   The database entoity from the given user
     * @return RedirectResponse
     */
    public function update(InformationValidator $input, City $city): RedirectResponse 
    {
        if ($city->update($input->all())) { // Update confirmation
            $city->province()->associate($input->province)->save(); // attach the same or new province to the city. 
        
            auth()->user()->logActivity($city, 'Monitor', "Heeft een gegevens van de stad {$city->naam} aangepast.");
            flash("De informatie van de stad {$city->naam} is aangepast.")->success();
        }

        return redirect()->route('monitor.show', $city);
    }
}
