  @extends('admin.adminlayout.master')
  @section('title')
  Admin - article detail
  @endsection
  @section('content')
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('admin.news.index') }}">Article table</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>
  {!!$data->content!!}
  <a href="{{ route('admin.news.index') }}" class="btn btn-info">Back</a>
  @endsection