<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->with('products')->get();
        return view('client.orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $order = Auth::user()->orders()->create([
            'status' => 'new',
        ]);

        return redirect()->route('orders.show', $order);
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        $order->load('products');
        return view('client.orders.show', compact('order'));
    }
}
