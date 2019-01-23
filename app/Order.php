<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 	public function status(){
 		return $this->belongsTo('\App\Status');
 	}

 	public function items(){
 		return $this->belongsToMany('\App\Item', 'item_orders')->withPivot("quantity")->withTimestamps();
 	}
}
