<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
use Auth;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request){

        // $this->validate($request, [

        // 'customer_name' => 'required|string|max:25',
        // 'customer_email' => 'required|string|email|max:30',
        // 'street' => 'required|string|max:255',
        // 'city' =>'required|string|max:25',
        // 'customer_phone' => 'required|string|max:14',
        // 'postcode' => 'required|string|max:5',
        // ]);

        $content = [];

        foreach (\Cart::getContent() as $item){
            array_push($content, [
                'id' => $item->id,
                'quantity' => $item->quantity
            ]);
        }

        Order::create([
        'user_id' => Auth::id(),
        'status' => 1,
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'street' => $request->street,
        'city' => $request->city,
        'customer_phone' => $request->customer_phone,
        'postcode' => $request->postcode,
        'cus_card' => $request->cus_card ?? '',
        'content' => json_encode($content)
        ]);

        Cart::clear();
        return redirect()->route('home.success');
    }
}
