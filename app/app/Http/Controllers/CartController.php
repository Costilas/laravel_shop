<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer|regex:/^[1-9]+[0-9]?$/'
        ]);

        $data = $request->all();
        $product = Product::findOrFail($data['product_id']);

        $cart = new Cart();
        $cart->addToCart($product, $data['qty']);

        return view('cart.cart-modal');
    }

    public function delete($id)
    {
        $cart = new Cart();
        $cart->deleteFromCart($id);

        return $this->show();
    }

    public function show()
    {
        return view('cart.cart-modal');
    }

    public function clear()
    {
        $cart = new Cart();
        $cart->clearCart();

        return view('cart.cart-modal');
    }

    public function checkout(Request $request)
    {
        if($request->method() == 'POST') {
            $request->validate([
               'name' => 'required',
               'email' => 'required',
               'phone' => 'required',
               'address' => 'required',
            ]);

            $data = $request->all();

            DB::transaction(function () use ($data) {
                $order_data = array_merge([
                    'qty' => session('cart_qty'),
                    'total' => session('cart_total'),
                ], $data);
                $order = Order::create($order_data);
                $order->products()->createMany(session('cart'));
                session()->forget('cart');
                session()->forget('cart_qty');
                session()->forget('cart_total');
                return redirect()->route('cart.checkout')->with('success', 'Заказ оформлен');
            });
        }
        return view('cart.checkout');
    }
}
