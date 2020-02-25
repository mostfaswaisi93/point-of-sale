<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Client;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function products(Order $order)
    {
        $products = $order->products;
        return view('admin.orders._products', compact('order', 'products'));
    }

    public function destroy(Order $order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);
        }

        $order->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.orders.index');
    }

    public function store(Client $client)
    {
        $rules = array(
            'name'      => 'required',
            'phone'     => 'required|array|min:1',
            'phone.0'   => 'required',
            'address'   => 'required',
        );

        $error = Validator::make($client->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $client_data = $client->all();
        $client_data['phone'] = array_filter($client->phone);

        dd($client_data);

        Client::create($client_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.orders.index');
    }
}
