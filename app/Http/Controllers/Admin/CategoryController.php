<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\inputReq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category_model;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\createCategoryReq;
class CategoryController extends Controller
{   
  public function search(Request $request)
  {
    $search = $request->get('search');
    $data = DB::table('categories')
    ->where('name', 'like' , '%'.$search.'%' )
    ->get();
    
    return view('admin.categoryManagement.index', compact('data'));
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = DB::table('categories')->get();
        return view('admin.categoryManagement.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.categoryManagement.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createCategoryReq $request)
    {   

        $insertData = new category_model;
        $insertData->name = $request->name;
        if ($insertData->save()) {
            return redirect(route('admin.category.index'))->withSuccess( 'Create successful' );
        }
        else
        {
            return redirect(route('admin.category.create'))->withWarning('message', 'Update failed');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        $data  = category_model::findOrFail($id);
        return view('admin.categoryManagement.edit' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = category_model::find($id);
        $data->name = $request->name;
        
        if ($data->save()) 
        {
            return redirect()->route('admin.category.index', $id)->withSuccess( 'Update successful' );
        }
        else{
         return redirect()->route('admin.category.edit', $id)->withWarning('message', 'Update failed');
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
        $data = category_model::find($id);
        $data->delete();
        return redirect()->action('Admin\CategoryController@index')->withSuccess( 'Delete successful' );
    }
}
