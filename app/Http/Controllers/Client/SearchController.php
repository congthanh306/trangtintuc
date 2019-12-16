<?php

namespace App\Http\Controllers\Client;
use App\Http\Requests\searchReq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category_model;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
	public function search(searchReq $request)
	{		
		$search = $request->input('search');
		$categories = DB::table('categories')->get();
		$data = DB::table('news')
		->where('author', 'like' , '%'.$search.'%' )
		->orWhere('title', 'like' , '%'.$search.'%' )
		->get();  
		return view('Client.clientSubLayouts.search', compact('data','categories'));
	}
}
