<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

/**
 *
 */
class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
//        $stripe = Cashier::stripe();
//        $products = $stripe->products->all();
        dd(auth()->user()->subscription('silver')->cancel());
//        dd($products);
        //        dd(auth()->user()->subscribed('silve'));
        return view('products.index', compact('products'));
    }

    /**
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(Product $product, Request $request)
    {
        if (auth()->user()->subscribedToProduct($product->stripe_product, $product->slug)) {
            return redirect()->route('home')->with('success', 'You have already subscribed the plan');
        }
        return view('products.show', compact('product'));
    }
}
