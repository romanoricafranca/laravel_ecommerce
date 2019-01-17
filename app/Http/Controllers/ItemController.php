<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Session;
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

		//saving to laravel file
		$image = $request->file('image');
		$image_name = time().".".$image->getClientOriginalExtension();
		$destination = "images/";
		$image->move($destination, $image_name);

		//items_table img_path
		$item->img_path = $destination.$image_name;
		$item->save();

		Session::flash('successmessage', 'items added successfully');
		return redirect('/catalog');
	}

	public function deleteItem($id)
	{
		$itemdelete = Item::find($id);
		$itemdelete->delete();
		return redirect('/catalog');
	}

	public function showEditForm($id)
	{
		$itemedit = Item::find($id);
		$categories = Category::all();
		return view('items.item_edit', compact('itemedit', 'categories'));
	}

	public function updateItem($id, Request $request)
	{
		$itemupdate = Item::find($id);

		$rules = array(
			"name" => "required",
			"description" => "required",
			"price" => "required|numeric",
			"categories" => "required",
			"image"=>"required|image|mimes:jpeg,jpg,png,gif,svg|max:2048"
		);
		//to validate $request from form
		$this->validate($request,$rules);

		$itemupdate->name = $request->name;
		$itemupdate->description = $request->description;
		$itemupdate->price = $request->price;
		$itemupdate->category_id = $request->categories;

		// dd($itemupdate);

		if ($request->file('image')!=null) {	//if I upload new image for item
		//saving to laravel file
		$image = $request->file('image');
		$image_name = time().".".$image->getClientOriginalExtension();
		$destination = "images/";
		$image->move($destination, $image_name);
		$itemupdate->img_path = $destination.$image_name;
		}


		//items_table img_path
		$itemupdate->save();
		return redirect('/menu/'.$id); //itemdetails		

	}
}
