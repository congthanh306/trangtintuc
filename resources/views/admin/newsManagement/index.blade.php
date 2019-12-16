  @extends('admin.adminlayout.master')
  @section('title')
  Admin - Staff index
  @endsection
  @section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('admin.news.index') }}">Staff table</a>
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

  <div class="row">
    <div class="col-sm-12"> 
      <form method="get" action="{{ route('admin.news.search') }}">
        <div class="input-group mb-3">
         <a href="{{ route('admin.news.create') }}" class="btn btn-info">Create article</a>
         <input type="text" class="form-control" placeholder="Search something..." name="search">
         <div class="input-group-append">
          <button class="btn-block btn btn-danger">Go</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- /Row search and create  -->

<div class="row">
  <div class="col-sm-12">
    @foreach( $categories as $item)
    <a href="{{ route('admin.news.type', $item->id) }}" class="btn btn-info mb-2">{{ $item-> name }}</a>
    @endforeach
  </div>
</div>
<!-- Row search and create -->

<!--  table data -->
<table class="table table-inverse">
 <thead>
   <tr>
     <th>No.</th>
     <th>Title</th>
     <th>Image</th>
     <th>Description</th>
     <th>Type</th>
     <th>Author</th>
     <th>Action</th>
   </tr>
 </thead>
 <tbody>
  <?php $count = 0 ?>
  @foreach ($data as  $item)
  <tr>
   <td>{{ ++$count }}</td>
   <td>{{ $item->title }}</td>
   <td>
    <img src="/img/{{ $item->image }}" alt="" style="width:250px;height:150px; object-fit:cover;">
  </td>
  <td>{{ $item->description }}</td>
   <td>{{ $dataChange[$item->idCategory] }}</td>
  <td>{{ $item->author }}</td>
  <td>
    <div class="btn-group">
      <a href="{{ route('admin.news.show', $item->id)}}" class="btn btn-info">Show</a>
      <a href="{{ route('admin.news.edit', $item->id)}}" class="btn btn-warning">Edit</a>
      <a href="#" class="btn btn-danger" data-href="delete.php?id=23" data-toggle="modal" data-target="#confirm-delete{{$item->id}}">Delete</a>
    </div>
  </td>
</tr>

<!--  confirm modal delete -->
<div class="modal fade" id="confirm-delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        Are you sure to delete "{{ $item->title }}"?
      </div>
      <div class="modal-footer">
       <form method="POST" action="{{ route('admin.news.destroy', $item->id)}}">
         @method('DELETE')
         @csrf
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-danger btn-ok">Delete</button>
       </form>
     </div>
   </div>
 </div>
</div>
@endforeach
</tbody>
</table>

<div class="row">
 <div class="col-sm-4"></div>
 <div class="col-sm-4">
   {!! $data->links() !!}
 </div>
 <div class="col-sm-4"></div>
</div>
<!--  table data -->
@endsection