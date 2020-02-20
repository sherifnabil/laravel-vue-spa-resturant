<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RestoService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResturantRequest;

class ResturantsController extends Controller
{
    public function index(RestoService $restoService)
    {
        $restos = $restoService->userRestoAndTables();
    
        return view('restos.restos-index', compact('restos'));
    }
    
    public function store(ResturantRequest $request)
    {
        $data = $request->validated();
        $user =  Auth::user();
        $resto = $user->resturants()->create($data);
        return response()->json($resto, 201);
    }

}
