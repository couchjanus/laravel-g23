<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand')->with('category')->with('pictures')->simplePaginate(9);
        return view('home.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('home.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $itemId = $request->productId;
        $quantity = $request->quantity ?? 1;

        if(Cart::isEmpty()){
            $this->addProduct($request, $quantity, $itemId);
        }else{
            if(Cart::get($itemId)){
                Cart::update($itemId, [
                    'quantity' => $quantity
                ]);
            }else{
                $this->addProduct($request, $quantity, $itemId);
            }
        }
        return redirect()->back();
    }

    private function addProduct($request, $quantity, $itemId){
        $product = Product::whereId($itemId)->with('brand')->with('category')->with('pictures')->firstOrFail();

        $options = ['picture' => $product->pictures[0]->picture_path];
        Cart::add($itemId, $product->name, $request->price, $quantity, $options);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::whereId($id)->with('brand')->with('category')->with('pictures')->firstOrFail();
        return view('home.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        return view('home.checkout');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeItem($id)
    {
        Cart::remove($id);

        if(Cart::isEmpty()){
            return redirect('/');
        }
        return redirect()->back()->withMessage('Cart item removed from Shopping cart successfully!');

    }
}
