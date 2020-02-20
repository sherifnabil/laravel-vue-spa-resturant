<?php

namespace App\Models;

use App\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    protected $guarded = [];
    protected $appends = ['slug', 'ordersSlug'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'resto_id');
    }

    public function getslugAttribute()
    {
        return route('restos.menu', $this->id);
    }

    public function getOrdersSlugAttribute()
    {
        return route('resto.orders', $this->id);
    }
}
