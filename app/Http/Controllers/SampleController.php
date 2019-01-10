<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function nameoftheFunction(){
    	//arguments here
    	$fullname = [
		'name'=>'juan',
		'middlename'=>'dela',
		'surname'=>'cruz'
		];
		return view("sample", compact("fullname"));
    }

    public function nameofAnimals(){
    	//arguments here..
    	$fruits = ['citrus'=>'lime',
    				'tropical'=>'banana',
    				'berry'=>'strawberry'];

    				return view("fruits", compact('fruits'));
    }
}
