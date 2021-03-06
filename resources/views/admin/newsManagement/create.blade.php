 @extends('admin.adminlayout.master')
 @section('title')
 Admin - article create
 @endsection
 @section('content')
 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.news.index') }}">Articles table</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{ route('admin.news.create') }}">Create new article</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>

<!-- thông báo lỗi-->
@if( Session::has( 'success' ))
<div class="p-3 mb-3 bg-success text-white"> 
  <button type="button"  class="close" data-dismiis = "alert">x</button>       
  {{ Session::get( 'success' ) }}
</div>
@elseif( Session::has( 'warning' ))
<div class="p-3 mb-3 bg-danger text-white"> 
  {{Session::get('warning')}}
</div>
@endif


<form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
  <!-- ckecditor -->
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
  @csrf
  <fieldset class="form-group">
    <label>title</label>
    <input type="text" class="form-control" name="title">
    <p><small class="text-danger">{{ $errors->first('title') }}</small></p>
  </fieldset>

  <fieldset class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" name="description">
    <p><small class="text-danger">{{ $errors->first('description') }}</small></p>
  </fieldset>

  <fieldset class="form-group">
   <label>Author</label>
   <input type="text" class="form-control" name="author">
   <p><small class="text-danger">{{ $errors->first('author') }}</small></p>
 </fieldset>

 <fieldset class="form-group">
   <label>Type of article</label>
   <select  class="form-control" name="typeOfArticle">
    <option value=""></option>
     @foreach($categories as $item)
     <option value="{{$item->id}}">
      {{$item->name}}
    </option>

    @endforeach
  </select>
  <p><small class="text-danger">{{ $errors->first('typeOfArticle') }}</small></p>
</fieldset>

<fieldset class="form-group">
  <label>Image</label>
  <img id="imgOup"  style="width: 10%;" />
  <input type="file" class="form-control" name="image"  id="imgInp">
  <p><small class="text-danger">{{ $errors->first('image') }}</small></p>
</fieldset>

<textarea name="content"></textarea>
<p><small class="text-danger">{{ $errors->first('content') }}</small></p>
<script>
  CKEDITOR.replace( 'content', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  } );
</script>

<fieldset class="form-group float-right mt-3">
  <div class="btn-group">
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back</a>
  </div>
</fieldset>
</form>
@endsection