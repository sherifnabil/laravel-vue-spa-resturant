<?php

namespace App\Http\Controllers;

use App\Models\Menue;
use App\Models\Order;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ResturantOrderRequest;

class ResturantOrderController extends Controller
{
    public function index($id)
    {
        $resto = Resturant::find($id);
        $orders = Order::where('resto_id', $id)
        ->orderBy('isComplete')
        ->paginate(15);
        if (!$resto) {
            abort(404, 'Unable to find this Resturant');
        }
        return view('orders.order-index', compact('resto', 'orders'));
    }

    public function add($id)
    {
        $resto = Resturant::findOrfail($id);
        
        return view('orders.order-add', compact('resto'));
        
    }

    public function store(ResturantOrderRequest $request)
    {
        $data =  $request->validated();
        // dd($data);
        $itemIds = $data['order_data']['orderDetails'];
        
        try {
            DB::beginTransaction();
            $ordersTota = 0;
            foreach ($itemIds as $id) {
                $menu = Menue::query()
                ->where('id', $id)
                ->where('resturant_id', $data['resturant_id'])
                ->first();

                if($menu){
                    $ordersTota += $menu->price;
                }
                
            }
            $order = Order::create([
                'resto_id'      =>   $data['resturant_id'],
                'user_id'       =>   auth()->user()->id,
                'amount'        =>   $ordersTota,
                'isComplete'    =>   0,
                'order_details' =>  [
                    'items'         =>    $data['order_data']['customerDetails'],
                    'name'          =>    $data['order_data']['customerDetails']['name'],
                    'phone'         =>    $data['order_data']['customerDetails']['phone'],
                    'address'       =>    $data['order_data']['customerDetails']['address'],
                ]
            ]);
            DB::commit();
        } catch (\Exception $e) {
            logger($e);
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return response()->json($order, 201);
    }
}
