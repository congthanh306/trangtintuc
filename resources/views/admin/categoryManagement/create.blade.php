 @extends('admin.adminlayout.master')
 @section('title')
 Admin - create category
 @endsection
 @section('content')
 <div class="container-fluid">
   <!-- Breadcrumbs-->
   <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('admin.category.index') }}">Category table</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ route('admin.category.create') }}">Create category</a>
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
  <form action="{{route('admin.category.store')}}" method="post">
    @csrf
    <fieldset class="form-group">
      <label for="formGroupExampleInput">Name</label>
      <input type="text" class="form-control" name="name">
      <p class="text-danger">{{ $errors->first('name') }}</p>
    </fieldset>
    <fieldset class="form-group float-right">
      <div class="btn-group">
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back</a>
      </div>
    </fieldset>
  </form>
</div>
@endsection