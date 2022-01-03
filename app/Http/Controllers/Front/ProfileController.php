<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\OrderRequest;
use App\Http\Requests\Front\ProfileRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return view('front.profile.index', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = $request->user();
        $attributes = $request->validated();
        if(isset($attributes['current_password'])) {
            if (!Hash::check($attributes['current_password'], $user->password))
                return redirect()->back(301)->with('error', 'Incorrect current password');
            $attributes['password'] = Hash::make($attributes['new_password']);
        }
        $user->update($attributes);
        return redirect()->back(301)->with('success', 'Profile successfully updated!');
    }

    public function cart(Request $request)
    {
        $user = $request->user();
        $cart = $user->cart()->with('book')->get();
        $cart = CartResource::collection($cart);
        return view('front.profile.cart', compact('cart'));
    }

    public function makeOrder(Request $request)
    {
        $user = $request->user();
        $cart = $user->cart()->with('book')->get();
        $cart = CartResource::collection($cart);
        return view('front.profile.make_order', compact('cart'));
    }

    public function createOrder(OrderRequest $request)
    {
        $user = $request->user();
        $attributes = $request->validated();
        $attributes['status'] = 'pending';
        $attributes['user_id'] = $user->id;
        /** @var Order $order */
        $order = Order::create($attributes);
        $cart = Cart::where('user_id', $user->id)->select('book_id as id')->get();
        $order->books()->sync($cart->pluck('id'));
        Cart::where('user_id', $user->id)->delete();
        return redirect()->route('front.profile.orders')->with('success', 'Order successfully created');
    }

    public function orders(Request $request)
    {
        $user = $request->user();
        $orders = Order::where('user_id', $user->id)->with('books')->get();
        return view('front.profile.order', compact('orders'));
    }
}
