<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;

class RemoveFromCart extends Controller
{
    public function __invoke(Request $request, $id) {
		\Cart::remove($id);
		return back();
	}
}
