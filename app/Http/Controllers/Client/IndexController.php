<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_model;
use App\Models\category_model;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
	public function index(){
		$data = [];
		$categories = DB::table('categories')->get();
		foreach ($categories as $item) {
			$data[$item->id] = $item->name;
		}
		
		$data_horizontal_small = DB::table('news')->where('idCategory', 1)->inRandomOrder()->offset(0)->take(2)->get();

		$data_horizontal_big = DB::table('news')->where('idCategory', 3)->inRandomOrder()->limit(1)->take(1)->get();

		$data_vertical = DB::table('news')->inRandomOrder()->limit(4)->get();

		$data_tinmoi = DB::table('news')->orderBy('id', 'desc')->take(1)->get();

		$data_tinmoi_line_2 = DB::table('news')->orderBy('id', 'desc')->offset(1)->take(2)->get();

		$data_random = DB::table('news')->inRandomOrder()->limit(1)->get();

		$data_random_line_2 = DB::table('news')->inRandomOrder()->limit(4)->get();

		$data_daily_week = DB::table('news')->orderBy('id', 'desc')->where('idCategory', 3)->take(4)->get();
		$data_daily_week_2 = DB::table('news')->orderBy('id', 'desc')->where('idCategory', 4)->take(4)->get();
		$data_daily_week_3 = DB::table('news')->orderBy('id', 'desc')->where('idCategory', 5)->take(4)->get();

		return view('client.clientSubLayouts.index', compact(
			'categories',
			'data',
			'data_horizontal_small',
			'data_horizontal_big',
			'data_vertical',
			'data_tinmoi',
			'data_tinmoi_line_2',
			'data_random',
			'data_random_line_2',
			'data_daily_week',
			'data_daily_week_2',
			'data_daily_week_3',
		));
	}

}
