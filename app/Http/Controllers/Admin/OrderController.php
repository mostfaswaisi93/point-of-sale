<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Client;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');
        })->paginate(5);

        return view('admin.orders.index', compact('orders'));
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

    public function create()
    {
        $categories = Category::with('products')->get();

        return view('admin.orders.create', compact('categories'))
            ->with('client', Client::get(['id', 'name']));
    }
}
