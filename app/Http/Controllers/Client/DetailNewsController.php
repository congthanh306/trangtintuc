<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_model;
use App\Models\category_model;
use Illuminate\Support\Facades\DB;
class DetailNewsController extends Controller
{
	public function showDetail($id){
		$nameUserChange = [];
		$user = DB::table('users')->get();

		foreach ($user as $item) {
			$nameUserChange[$item->id] = $item->username;
		}
		$dataComment = DB::table('comments')->where('idNews', $id)->get();
		$categories = DB::table('categories')->get();
		$data =DB::table('news')->where('id', '=', $id)->take(1)->get();
		return view('client.clientSubLayouts.detail', compact('data','categories','dataComment','nameUserChange'));
	}
}
