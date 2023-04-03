<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    
	public function index() {
		// return view('welcome', ['listItems' => ListItem::all()]);
		return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
	}
	public function markComplete($id) {
		// \Log::info($id);
		$listItem = ListItem::find($id);
		$listItem->is_complete = 1;
		$listItem->save(); 
		// \Log::info($listItem);

		return redirect('/');
	}

	public function saveItem(Request $request){
		$newListItem = new ListItem;
		$newListItem->name = $request->listItem;
		$newListItem->is_complete = 0;
		$newListItem->save(); 

		// \Log::info(json_encode($request->all()));
		return redirect('/');
	}
}
