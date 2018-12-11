<?php
/**
 * Created by PhpStorm.
 * User: Gluk
 * Date: 10.12.2018
 * Time: 20:17
 */

namespace App\Services;

use App\Menu;

final class GetItemsForMenuService {
	public function getMenus(){
		return Menu::orderBy('order', 'asc')->get();
	}
}