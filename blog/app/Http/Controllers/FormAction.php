<?php

namespace App\Http\Controllers;

use App\Item;
use App\Menu;
use App\Product;
use Illuminate\Http\Request;

class FormAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    	if($request->method() == 'POST') {
			$this->validate($request, [
				'name' => 'required|max:255|min:4|unique:products,name',
				'description' => 'required',
				'image' => 'image|mimes:jpeg,jpg,png|required',
				'price' => 'required|numeric'
				]);

			$product = new Product;
			$product->name = $request->input('name');//полученпие имени продукта
			$product->description = $request->input('description');// получение описания продукта
			$product->menu_id = $request->input('menu');

			$image = $request->image;
			if($image) {
				$imageName = $image->getClientOriginalName();//получение названия картинки из объекта изображения
				$image->move('images', $imageName); //передача изображения в директорию /images
				$product->image = 'http://streetfood/images/'.$imageName;
			}
			$product->save();//сохранение

			$item = new Item;
			$item->product_id = $product->id;
			$item->size = $request->input('size');
			$item->dimension = $request->input('dimension');
			$item->price = $request->input('price');
			$item->save();

			//dd($item);
		}

		return view('admin.form', ['menu' => Menu::all(), 'item' => Item::all()]);

	}
}
