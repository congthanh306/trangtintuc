@extends('admin.adminlayout.master')
@section('title')
Admin - categories
@endsection
@section('content')

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('admin.category.index') }}">Category table</a>
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
  <a href="{{ route('admin.category.create') }}" class="btn btn-info mb-2">Create category</a>
  <table class="table table-inverse">
   <thead>
     <tr>
       <th>No.</th>
       <th>Name</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
    <?php $count = 0 ?>
    @foreach ($data as  $item)
    <tr>
     <td>{{ ++$count }}</td>
     <td>{{ $item->name }}</td>
     <td>
      <div class="btn-group">
        <a href="{{ route('admin.category.edit', $item->id)}}" class="btn btn-warning"><i class="far fa-edit"></i></a>
        <a href="#" class="btn btn-danger" data-href="delete.php?id=23" data-toggle="modal" data-target="#confirm-delete{{$item->id}}"><i class="far fa-trash-alt"></i></a>
      </div>
    </td>
  </tr>

  <!--  confirm modal delete -->
  <div class="modal fade" id="confirm-delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          Are you sure to delete "{{ $item->name }}"?
        </div>
        <div class="modal-footer">
         <form method="POST" action="{{ route('admin.category.destroy', $item->id)}}">
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
@endsection


