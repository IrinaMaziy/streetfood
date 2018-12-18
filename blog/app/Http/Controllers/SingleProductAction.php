<?php

namespace App\Http\Controllers;

use App\Item;
use App\Product;
use Illuminate\Http\Request;

class SingleProductAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {

		$item = Item::find($id);
		//$item->quantity = 1;
		//$quantity = 1;

		$cart = session();
		//dd($cart->get('cart'));

		if($cart === null) {
			$cart = [];
			session()->put('cart', $cart);
		}
		session()->push('cart', $item);

		//session()->flush();
		return redirect()->route('show-cart');
    }
}
