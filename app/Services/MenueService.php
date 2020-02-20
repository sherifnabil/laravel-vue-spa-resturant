<?php

namespace App\Services;

use App\Models\Menue;

class MenueService{

    public function getMenueWithCategory($resturant_id)
    {
        $categories =  Menue::where('resturant_id', $resturant_id)
        ->get()
        ->groupBy('category.name');

        return $categories;
    }
    
}