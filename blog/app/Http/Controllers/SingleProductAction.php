<?php

namespace App\Http\Controllers;

use App\Item;
use App\Product;
use Darryldecode\Cart\Cart;
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
		\Cart::add([
			'id' => $item->id,
			'name' => $item->product->name,
			'price' => $item->price,
			'quantity' => 1,
			'attributes' => [
				'size' => $item->size,
				'dimension' => $item->dimension,
				'image' => $item->product->image
			]
		]);

		\Session::flash('flash', $item->product->name . 'was added to cart.');
		return back();
    }
}
