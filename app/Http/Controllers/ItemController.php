<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use Session;
use App\Order;
use DB;
use Auth;

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
		$categories = Category::all();

		return view('items.add_items', compact('categories'));	

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
		$item->category_id = $request->categories;

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

		Session::flash("deletemessage", "Item has deleted!");
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
			"image"=>"image|mimes:jpeg,jpg,png,gif,svg|max:2048"
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


		Session::flash("successmessage", "Item updated successfully!");
		return redirect('/menu/'.$id); //itemdetails		

	}


	//Cart
	public function addToCart($id, Request $request)
	{
		//if we have already items on cart
		if (Session::has("cart"))
		{
			$cart = Session::get("cart"); // we wil get the data from our Session cart
		}
		else
		{
			$cart = []; //if none, initiliaze cart
		}

		//if item on cart is already set
		if (isset($cart[$id]))
		{
			$cart[$id] += $request->quantity; //this will add only the quantity on existing item
		}
		else
		{
			$cart[$id] = $request->quantity; //this will create the item on the cart and quantity
		}

		Session::put('cart', $cart);
		// dd($cart);
		return redirect('/catalog');
	}


	public function showCart()
	{
		// Session::forget('cart');

		$item_cart = [];


		if (Session::has('cart')) {
			$cart = Session::get('cart');

			$total = 0;

			foreach ($cart as $id => $quantity) {
				$item = Item::find($id); //item id from our session cart
				$item->quantity = $quantity;
				$item->subtotal = $item->price * $quantity;

				$total += $item->subtotal;
				$item_cart[] = $item; //item = id,name, description, price, img_path, category, and QUANTITY & SUBTOTAL 
			}


		}
			return view('items.cart_content', compact('item_cart', 'total'));	


	}

	public function deletecart($id)
	{
		Session::forget("cart.$id");//$cart[$id]
		return redirect('showcart');
	}

	public function clearCart()
	{
		Session::forget('cart');
		return redirect('/catalog');
	}

	public function updateCart($id, Request $request)
	{
		$cart = Session::get('cart'); //get all items in cart
		$cart[$id] = $request->newqty;
		
		// dd($cart);

		Session::put('cart', $cart);

		return redirect('showcart');
	}


	public function checkout(){
		$order = new Order;
		$order->user_id = Auth::user()->id;
		$order->status_id = 1;
		$order->total = 0;
		$order->save();

		$cartitems = Session::get('cart');
		$total = 0;

		foreach ($cartitems as $item_id => $quantity) {
			// $order_id = DB::table('orders')->orderBy('created_at', 'desc')->first();
			// $item_orders = DB::table('item_orders')->insert(
			// 	['item_id' => $item_id, 'order_id' => $order_id->id, 'quantity' => $quantity]
			// );

			$order->items()->attach($item_id, ['quantity' => $quantity]);

			$item = Item::find($item_id);
			$total += $item->price * $quantity;
		}	

		$ordertotal = Order::find($order->id);
		$ordertotal->total = $total;
		$ordertotal->save();





	}


	public function showTransactions(){

		$orders = Order::all();

		return view('items.transactions', compact('orders'));

	}
}
