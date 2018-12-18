<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowCartAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

		$items = session()->get('cart');

		//dd($items);
		$total = 0;
		$count = count($items);
		foreach($items as $item){
			$total += $item->price;
		}
		return view('pages.cart', ['items' => $items, 'total' => $total, 'count' => $count]);
    }
}
