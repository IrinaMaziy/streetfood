<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Product;
use Illuminate\Http\Request;

class UpdateFormAction extends Controller
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
				'name' => 'required|max:255|min:4|unique:products,name,'.$request->input('id'),
				'description' => 'required',
				'image' => 'image|mimes:jpeg,jpg,png|required']);

			$product = Product::find($request->input('id'));
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
		} else{
			$product = Product::find($request->get('id'));
		}
		return view('admin.updateform', ['menu' => Menu::all(), 'product' => $product]);

	}
}
