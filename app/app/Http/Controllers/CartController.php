<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
