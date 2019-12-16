 @extends('admin.adminlayout.master')
 @section('title')
 Admin - Staff management
 @endsection
 @section('content')
 <ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="">Staff table</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>
<table class="table table-inverse">
 <thead>
   <tr>
     <th>No.</th>
     <th>Username</th>
     <th>Email</th>
     <th>Action</th>
   </tr>
 </thead>
 <tbody>
  <?php $count = 0?>
  @foreach( $data as $item )

  <tr>
   <td>{{++$count}}</td>
   <td>{{$item->username}}</td>
  <td>{{$item->email}}</td>
  <td>
    @if(Auth::user()->id == $item->id)
    <div class="btn-group">
     <a href="" class="btn btn-warning"><i class="far fa-edit"></i></a>
     <a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
   </div>
   @endif
 </td>
</tr>
@endforeach
</tbody>
</table>
@endsection