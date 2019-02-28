<?php

namespace App\Http\Controllers\Monitor;

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

    public function backend(Request $request): Renderable 
    {
        
    }
}
