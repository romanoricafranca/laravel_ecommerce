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
		return view ('items/catalog', compact("items","categories")); //to view folder by file
	}


	public function itemDetails($id)
	{
		$itemdetails = Item::find($id);
		// dd($itemdetails);
		return view('items.item_details', compact('itemdetails'));
	}

	public function showAdditemForm(){
		return view('items.add_items');	

	}

	public function saveItems(Request $request)
	{
		$rules = array(
			"name"=>"required",
			"description"=>"required",
			"price"=>"required|numeric",
			"image"=>"required|image|mimes:jpeg,jpg,png,gif,svg|max:2048"
		);
		//to validate $request from form

		$this->validate($request,$rules);

		$item = new Item;
		$item->name = $request->name;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->category_id = 1;


		$image = $request->file('image');
		$image_name = time().".".$image->getClientOriginalExtension();
		$destination = "images/";
		$image->move($destination, $image_name);

		//items_table img_path
		$item->img_path = $destination.$image_name;
		$item->save();
	}
}
