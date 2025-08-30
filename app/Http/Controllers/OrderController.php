<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\itemorder;

class OrderController extends Controller
{
    function  orders(){
        $order = order::all();
        $itemorder = itemorder::all();
        return view('admin.orders.index',compact('order','itemorder'));
    }
}
