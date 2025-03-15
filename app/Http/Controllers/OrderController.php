<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    
    public function index()
    {
        $ordenes = Order::all();
        return view('ordenes.orden', compact('ordenes'));
    }

    public function show($id)
    {
        $orden = Order::findOrFail($id); 
        return view('ordenes.orden', compact('orden'));

    }

}
