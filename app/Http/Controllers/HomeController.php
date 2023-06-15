<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;

class HomeController extends Controller
{
    //

    public function addToCart($id)
    {

        $music = Music::find($id);

        if (!$music) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product

        if (!$cart) {

            $cart = [

                $id => [

                    "name" => $music->name,

                    "quantity" => 1,

                    "price" => $music->price,

                    "photo" => $music->image

                ]

            ];

            session()->put('pages.cart', $cart);

            return view('pages.cart');

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if cart not empty then check if this product exist then increment quantity

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('pages.cart', $cart);

            return view('pages.cart', ['msg' => 'Song added to cart successfully!']);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1

        $cart[$id] = [

            "name" => $music->name,

            "quantity" => 1,

            "price" => $music->price,

            "photo" => $music->image

        ];

        session()->put('pages.cart', $cart);

        return view('pages.cart', ['msg' => 'Song added to cart successfully!']);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');

    }
    public function remove(Request $request)
    {
        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return view('pages.cart', ['msg' => 'Delete item in cart successfully!']);
    }
    public function cart()
    {
        return view('pages.cart');
    }
    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];
            $total = $this->getCartTotal();
            dd($cart);
            return view('pages.cart', ['msg' => 'Cart updated successfully', 'total' => $total, 'subTotal' => $subTotal]);
            //session()->flash('success', 'Cart updated successfully');

        }
    }
}