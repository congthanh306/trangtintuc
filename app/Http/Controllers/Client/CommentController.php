<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_model;
use App\Models\comment_model;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
	public function postComment(Request $request){
		$post = DB::table('news')->get(); 
		$insertComment = new comment_model;
		$insertComment->content = $request->content;
		$insertComment->created_at = date('Y-m-d H:i:s');
		$insertComment->idUser = Auth::id();
		$insertComment->idNews = $request->idNews;
		if ($insertComment->save()) {
			return response()->json($request->content);
		}
	}

	public function destroy($id)
	{
		$data = comment_model::find($id);
		$data->delete();
		return response()->json($data);
	}

	public function editcomment(Request $request, $id)
	{	
		$insertComment = comment_model::find($id);
		$insertComment->content = $request->content;
		$insertComment->created_at = date('Y-m-d H:i:s');
		$insertComment->idUser = Auth::id();
		$insertComment->idNews = $request->idNews;

		if ($insertComment->save()) 
		{
			return response()->json($request->content);
		}
		else{
			return response()->json($request->content);
		}
	}
}
