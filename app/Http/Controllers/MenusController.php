<?php

namespace App\Http\Controllers;

use App\Models\Menue;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\MenueService;
use App\Http\Requests\MenueRequest;
use App\Rules\RestoCategryValidate;

class MenusController extends Controller
{
    
    public function index($id, MenueService $service)
    {
        $resturant_id = $id;
        $menues = $service->getMenueWithCategory($id);
        return view('menus.menu-index', compact('menues', 'resturant_id'));
    }

    public function store(MenueRequest $request)
    {
        $category =  Category::where('resturant_id', $request->resturant_id)->where('name', $request->category)->first();
        $menu = Menue::create([
            'name'              =>  $request->item,
            'price'             =>  $request->price,
            'description'       =>  $request->description,
            'category_id'       =>  $category->id,
            'resturant_id'      =>  $request->resturant_id,
        ]);
        return response()->json($menu, 202);
    }

    public function getResturantMenu(Request $request)
    {
        $request->validate([
            'restoId'   =>  'required|numeric|exists:resturants,id'
        ]);
        $menuItems = Menue::where('resturant_id', $request->restoId)
        ->orderBy('category_id')
        ->get();
        return response()->json($menuItems);
    }
}
