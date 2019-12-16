<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news_model;
use App\Models\category_model;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\createNewsReq;
use App\Http\Requests\editNewsReq;
use Intervention\Image\ImageManagerStatic as Image;

class NewsController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $dataChange = [];
        $categories = DB::table('categories')->get();
        foreach ($categories as $item) {
            $dataChange[$item->id] = $item->name;
        }
        $data = DB::table('news')->orderBy('id', 'desc')->paginate(3); 
        return view('admin.newsManagement.index', compact('data','categories','dataChange'));
    }

    public function getType($id)
    {
       $dataChange = [];
       $categories = DB::table('categories')->get();
       foreach ($categories as $item) {
        $dataChange[$item->id] = $item->name;
    }
    $data = DB::table('news')
    ->join('categories', 'categories.id', '=', 'news.idCategory')
    ->select('news.*')
    ->orderBy('id', 'desc')
    ->where('categories.id', '=',$id)
    ->paginate(3); 
    return view('admin.newsManagement.index', compact('data','categories','dataChange'));
}

public function search(Request $request)
{
    $search = $request->get('search');
    $dataChange = [];
    $categories = DB::table('categories')->get();
    foreach ($categories as $item) {
        $dataChange[$item->id] = $item->name;
    }
    $data = DB::table('news')
    ->where('author', 'like' , '%'.$search.'%' )
    ->orWhere('title', 'like' , '%'.$search.'%' )
    ->paginate(4); 
    return view('admin.newsManagement.index', compact('data','categories','dataChange'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories =DB::table('categories')->get();
        return view('admin.newsManagement.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createNewsReq $request)
    {   
        $insertData = new news_model;
        $insertData->title = $request->title;
        $insertData->author = $request->author;
        $insertData->description = $request->description;
        $insertData->content = $request->content;
        $insertData->idCategory = $request->typeOfArticle;
        $insertData->created_at = date('Y-m-d H:i:s');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename =  $file->getClientOriginalName('image');
            $file->move('img',  $filename);
             //Resize nếu cần
             // $image_resize = Image::make($file->getRealPath());              
             // $image_resize->resize(200, 150);
             // $image_resize->save(public_path('img/' .$filename));
            $insertData->image = $filename;
        }

        if ($insertData->save()) {
            return redirect(route('admin.news.index'))->withSuccess( 'Create successful' );
        }
        else
        {
            return redirect(route('admin.news.create'))->withWarning('Update failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data =DB::table('news')->where('id', '=', $id)->first();
        return view('admin.newsManagement.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
     $categories =DB::table('categories')->get();
     $data  = news_model::find($id);
     return view('admin.newsManagement.edit' , compact('data','categories'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editNewsReq $request, $id)
    {   
       $insertData = news_model::find($id);
       $insertData->title = $request->title;
       $insertData->author = $request->author;
       $insertData->description = $request->description;
       $insertData->content = $request->content;
       $insertData->idCategory = $request->typeOfArticle;
       $insertData->created_at = date('Y-m-d H:i:s');

       if($request->hasFile('image')){
        $file = $request->file('image');
        $filename =  $file->getClientOriginalName('image');
        $file->move('img',  $filename);
        $insertData->image = $filename;
    }
    else
    {
        $insertData->image = $request->ImageNochoose;
    }

    if ($insertData->save()) {
        return redirect()->route('admin.news.index', $id)->withSuccess( 'Update successful' );
    }
    else
    {   
       return redirect()->route('admin.news.edit', $id)->withWarning('message', 'Update failed');
   }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = news_model::find($id);
        $data->delete();
        return redirect()->action('Admin\NewsController@index')->withSuccess( 'Delete successful' );
    }
}

