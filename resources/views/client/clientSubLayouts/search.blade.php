@extends('client.clientLayout.master')
@section('title')

@endsection
@section('content')
<div class="row">

  <!-- Post Content Column -->
  <div class="col-lg-8">


    <!-- search bar -->
    <div class="row">
      <div class="col-sm-12"> 
        <form method="get" action="{{ route('client.search') }}">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Search something...">
            <div class="input-group-append">
              <button type="submit" class="btn-block btn btn-danger btn-block"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <p><small class="text-danger">{{ $errors->first('search') }}</small></p>
    <!--/ search bar -->

    <!-- Result -->

    <?php echo "Tìm được ".count($data)." kết quả" ?>
    <hr>
    <!-- 1 result -->
    @foreach ( $data as $item )
    <div class="row _1result">
     <div class="col-sm-5">
       <a href="{{ route('client.showdetail', $item->id)}}"><img src="/img/{{$item -> image}}" class="img-fluid"></a>
     </div>
     <div class="col-sm-7">
      <a href="{{ route('client.showdetail', $item->id)}}"><h6 class="text-justify">{{$item -> title}}</h6></a>
      <a href="{{ route('client.showdetail', $item->id)}}"><p class="text-justify"><small>{{$item -> description}}</small></p></a>
      <a href="{{ route('client.showdetail', $item->id)}}"><p class="text-justify"><small>{{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</small></p></a>
    </div>
  </div>
  <hr>
  @endforeach
  <!-- 1 result -->

  <!--/ Result -->
  <!-- Comment with nested comments -->
  <div class="media mb-4">


  </div>

</div>

<!-- Sidebar Widgets Column -->
<div class="col-md-4">

  <!-- Search Widget -->
  <div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>

  <!-- Categories Widget -->
  <div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">Web Design</a>
            </li>
            <li>
              <a href="#">HTML</a>
            </li>
            <li>
              <a href="#">Freebies</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">JavaScript</a>
            </li>
            <li>
              <a href="#">CSS</a>
            </li>
            <li>
              <a href="#">Tutorials</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Side Widget -->
  <div class="card my-4">
    <h5 class="card-header">Side Widget</h5>
    <div class="card-body">
      You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
    </div>
  </div>

</div>

</div>
<!-- /.row -->
@endsection