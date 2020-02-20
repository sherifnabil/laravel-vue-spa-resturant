<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenueService;
use App\Services\RestoService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenueService $service, RestoService $restoService)
    {
        $restos = $restoService->userRestoAndTables();
        $resturant_id = 1;
        $menues = $service->getMenueWithCategory($resturant_id);
        return view('home', compact('menues', 'resturant_id', 'restos'));
    }
}
