<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Product;
use Illuminate\Http\Request;

class ProductsAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $key)
    {
    	$menu = Menu::where('key', $key)->first();
    	//$products = Product::withoutTrashed()->paginate(8);
		$products = $menu->product()->paginate(4);
		return view('pages.shop-grid-4-column', ['products' => $products]);
		//dd($products);
    }
}
