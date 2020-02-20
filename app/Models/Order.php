<?php

namespace App\Models;

use App\Models\Resturant;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = ['order_details' =>  'array'];

    public function resturants()
    {
        return $this->belongsTo(Resturant::class, 'resto_id');
    }
}
