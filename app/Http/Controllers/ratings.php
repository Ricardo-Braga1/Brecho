<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
class ratings extends Controller
{
    public function addRating(Request $request)
    {
         $rate = $request->rate;
         $order = $request->Order;
         $order->rating=$rate;
         $order->save();
         return view('home.order');

    }   
}
