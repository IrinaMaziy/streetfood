<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Product;
use Illuminate\Http\Request;

class FormProceedingAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    	//dd($request);
		$this->validate($request, [
    		'name' => 'required|max:255|min:4|unique:products,name',
			'description' => 'required',
			'image' => 'image|mimes:jpeg,jpg,png'
		]);


			$product = new Product;
			$product->name = $request->input('name');//полученпие имени продукта
			$product->description = $request->input('description');// получение описания продукта
			$product->image = $request->input('image');
			;$product->menu_id = $request->input('menu');

		$image = $request->image;
		if($image){
			$imageName = $image->getClientOriginalName();//получение названия картинки из объекта изображения
			$image->move('images', $imageName); //передача изображения в директорию /images
			$product->image = 'http://streetfood/images/'.$imageName;
		}
		$product->save();//сохранение
        return view('admin.form', ['menu' => Menu::all()]);
    }
}
