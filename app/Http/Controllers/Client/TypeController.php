<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_model;
use App\Models\category_model;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
	public function getType($id)
	{	
		$categories =DB::table('categories')->get();
		$categories_title =DB::table('categories')->where('id', $id)->get();

		$data_horizontal_small = DB::table('news')
		->join('categories', 'categories.id', '=', 'news.idCategory')
		->take(2)
		->select('news.*')
		->where('categories.id', '=',$id)
		->get();


		$data_horizontal_big = DB::table('news')
		->join('categories', 'categories.id', '=', 'news.idCategory')
		->offset(2)
		->take(1)
		->select('news.*')
		->where('categories.id', '=',$id)
		->get();

		$data_vertical = DB::table('news')
		->join('categories', 'categories.id', '=', 'news.idCategory')
		->offset(3)
		->take(4)
		->select('news.*')
		->where('categories.id', '=',$id)
		->get();
		
		$data_tinmoi = DB::table('news')->orderBy('id', 'desc')->take(1)->get();

		$data_tinmoi_line_2 = DB::table('news')->orderBy('id', 'desc')->offset(1)->take(2)->get();

		$data_random = DB::table('news')->inRandomOrder()->limit(1)->get();

		$data_random_line_2 = DB::table('news')->inRandomOrder()->limit(4)->get();

		$data_daily_week = DB::table('news')->orderBy('id', 'desc')->where('idCategory', 3)->take(4)->get();
		$data_daily_week_2 = DB::table('news')->orderBy('id', 'desc')->where('idCategory', 4)->take(4)->get();
		$data_daily_week_3 = DB::table('news')->orderBy('id', 'desc')->where('idCategory', 5)->take(4)->get();

		$data = DB::table('news')
		->join('categories', 'categories.id', '=', 'news.idCategory')
		->select('news.*')
		->where('categories.id', '=',$id)
		->paginate(2);
		return view('client.clientSubLayouts.type', compact(
			'categories',
			'categories_title',
			'data_horizontal_small',
			'data_horizontal_big',
			'data_vertical',
			'data_tinmoi',
			'data_tinmoi_line_2',
			'data_random',
			'data_random_line_2',
			'data',
			'data_daily_week',
			'data_daily_week_2',
			'data_daily_week_3',
		));
	}
}
