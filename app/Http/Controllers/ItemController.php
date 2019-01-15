<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
class ItemController extends Controller
{
    public function showItems(){
    	$categories = Category::all();    //retrieve
   		$items = Item::all();
		return view ('catalog', compact("items","categories")); //to view folder by file
	}
}
