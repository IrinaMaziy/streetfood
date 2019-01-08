<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class UpdateCart extends Controller
{
    public function __invoke(Request $request) {
		foreach($request->post()['items'] as $id => $quantity){
			\Cart::update($id, [
				'quantity' => [
					'relative' => false,//чтобы данные в карте до не суммировались, а заменялись (кол-во)
					'value' => $quantity
				]
			]);
		}
		return back();
	}
}
