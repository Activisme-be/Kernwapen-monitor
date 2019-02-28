<?php

namespace App\Http\Controllers\Monitor;

use App\Models\Postal;
use App\Models\City;
use App\Models\Signature;
use Illuminate\Http\Request;
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
        $this->middleware(['auth', 'forbid-banned-user']);
    }

    /**
     * Method for the monitor backend view. 
     * 
     * @param  Request   $request       The form request class that holds all the request information
     * @param  City      $cities        The database model class for the cities
     * @param  Postal    $postal        The database model class for the postal codes. 
     * @param  Signature $signatures    The database model class for the petition signatures.
     * @return Renderable 
     */
    public function dashboard(Request $request, City $cities, Postal $postal, Signature $signatures): Renderable 
    {
        return view('monitor.dashboard', [
            'cities'     => $cities->simplePaginate(), 
            'cityCount'  => str_replace(',', '.', number_format($postal->count())),
            'signatures' => str_replace(',', '.', number_format($signatures->count()))
        ]);
    }
}
