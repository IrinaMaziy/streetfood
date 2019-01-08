<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DeleteFormAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		return view('admin/products-list', ['products' => Product::all()]);

    }

    public function delete(Request $request)
	{
		$product = Product::find($request->input('id'));
		$product->delete();
		return back();
	}
}
