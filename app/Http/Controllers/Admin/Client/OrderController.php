<?php

namespace App\Http\Controllers\Admin\Client;

use App\Category;
use App\Client;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    { }

    public function create(Client $client)
    {
        $categories = Category::with('products')->get();

        return view('admin.clients.orders.create', compact('client', 'categories'));
    }

    public function store(Request $request, Client $client)
    { }

    public function edit(Client $client, Order $order)
    { }

    public function update(Request $request, Client $client, Order $order)
    { }

    public function destroy(Client $client, Order $order)
    { }
}
