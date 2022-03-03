<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function addToCart(Product $product, int $qty)
    {
        if (session()->has("cart.{$product->id}")) {
            session(["cart.{$product->id}.qty" => session("cart.{$product->id}.qty") + $qty]);
        } else {
            session([
                "cart.{$product->id}" => [
                    'id' => $product->id,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'img' => $product->getImage(),
                    'qty' => $qty,
                ]
            ]);
        }

        if(session()->has('cart_qty')) {
            session(['cart_qty' => session('cart_qty') + $qty]);
        } else {
            session(['cart_qty' => $qty]);
        }

        if(session()->has('cart_total')) {
            session(['cart_total' => session('cart_total') + $qty * $product->price]);
        } else {
            session(['cart_total' => $qty * $product->price]);
        }

    }

    public function deleteFromCart($id)
    {
        if (!session()->has("cart.{$id}")){
            return false;
        }
        $qtyMinus = session("cart.{$id}.qty");
        $priceMinus = session("cart.{$id}.price")*$qtyMinus;

        session(['cart_qty' => session('cart_qty')-$qtyMinus]);
        session(['cart_total' => session('cart_total')-$priceMinus]);
        session()->forget("cart.{$id}");

        return true;
    }

    public function clearCart()
    {
        session()->forget('cart');
        session()->forget('cart_qty');
        session()->forget('cart_total');

        return true;
    }
}
