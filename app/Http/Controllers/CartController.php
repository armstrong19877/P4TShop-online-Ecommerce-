<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function display_products(){
        $categories = Category::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'asc')->get();
        return view('frontend.users.index', compact(['products', 'categories']));
    }

    public function productAddToCart($id){
        $product = Product::find($id);
        $price = $product->disprice!=null?($product->disprice * $product->price/100):$product->price;
        if(!$product){
            abort(404);
        }
        //dd([$price, $product->name, $product->price, $product->disprice]);
        $cart = session()->get('cart');

        //condition is met only when cart is empty

        if(!$cart){
            $cart = [
                $id = [
                    'name' => $product->name,
                    'qty' => 1,
                    'price' => $price,
                    'image' => $product->image,
                    'id' => $product->id,
                ]
            ];
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
            
        // if cart not empty then check if this product exist then increment quantity

        if(isset($cart[$id])) {

            $cart[$id]['qty']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1

        $cart[$id] = [
            "name" => $product->name,
            "qty" => 1,
            "price" => $price,
            "image" => $product->image,
            'id' => $product->id,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function product($id){
        $product = Product::find($id);
        return view('frontend.users.product', compact('product'));
    }

    public function checkout(){
        return view('frontend.users.checkout');
    }

    public function cart(){
        return view('frontend.users.cart');
}


public function update(Request $request)
    {
       // dd($request->id);
        if($request->id || $request->id==0 && $request->qty)
        {
            
            $cart = session()->get('cart');

            $cart[$request->id]['qty'] = $request->qty;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }


    public function update_product_cart(Request $request)
    {
       // dd($request->id);
        if($request->id || $request->id==0 && $request->qty)
        {
            
            $cart = session()->get('cart');

            $cart[$request->id]['qty'] = $request->qty;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }



    public function remove(Request $request)
    {
        if($request->id || $request->id==0) {
            
            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    }
