<?php

namespace App\Http\Controllers\Back;

use App\Filters\Order as OrderFilter;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OrderController
{
    public function index(OrderFilter $order)
    {
        $orders = $order->filter();
        return view('back.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('back.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $attributes = $request->all();
        $this->validate($attributes);
        $order->update($attributes);
        return redirect()->back()->with('success', 'Order successfully updated');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order successfully deleted');
    }

    protected function validate(array $attributes)
    {
        Validator::validate($attributes, [
            'status' => 'required|in:pending,canceled,finished,processing'
        ]);
    }
}
