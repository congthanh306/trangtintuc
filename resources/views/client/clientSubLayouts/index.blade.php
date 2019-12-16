 @extends('client.clientLayout.master')
 @section('title')
 Home
 @endsection
 @section('content')
 @if( Session::has( 'warning' ))
 <div class="p-3 mb-3 bg-danger text-white">
   <button type="button"  class="close" data-dismiis = "alert">x</button>      
   {{Session::get('warning')}}
 </div>
 @endif
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



<!-- news_horizontal_index -->
<div class="row text-center news_horizontal_index">
 @foreach($data_horizontal_small as $item)
 <div class="col-lg-3 col-md-6 mb-4">
  <div class="card h-100">
    <a href="{{ route('client.showdetail', $item->id)}}"><img class="card-img-top" src="/img/{{ $item->image }}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title text-justify"><a href="{{ route('client.showdetail', $item->id)}}" >{{$item->title}}</a></h4>
      <p class="card-text text-justify"><a href="{{ route('client.showdetail', $item->id)}}" >{{$item->description}}</a></p>
    </div>
  </div>
</div>
@endforeach
@foreach($data_horizontal_big as $item)
<div class="col-lg-6 col-md-6 mb-4">
  <div class="card h-100 news_big_horizontal_index">
    <a href="{{ route('client.showdetail', $item->id)}}"><img class="card-img-top" src="/img/{{$item->image}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title text-left"><a href="{{ route('client.showdetail', $item->id)}}">{{$item->title}}</a></h4>
      <p class="card-text text-left"><a href="{{ route('client.showdetail', $item->id)}}">{{$item->description}}</a></p>
    </div>
  </div>
</div>
@endforeach
</div>
<!--/ news_horizontal_index -->

<!-- new_vertical_index -->
<div class="row text-center">
  <div class="col-sm-9">
    <!-- 1 new -->
    @foreach($data_vertical as $item)
    <div class="_1_new pb-3">
     <div class="row new_vertical_index"> 
      <a href="{{ route('client.showdetail', $item->id)}}"  class="card-img-top col-sm-4"><img src="/img/{{$item->image}}" alt="" style="width:  90%; object-fit:cover;"></a>
      <div class="card-body col-sm-8">
        <p class="card-title text-left"><a href="{{ route('client.showdetail', $item->id)}}">{{$item->title}}</a></p>
        <p class="card-title text-left"><i>{{$item->author}}</i></p>
        <p class="card-title text-left"><small>{{$data[$item->idCategory]}}</small></p>
      </div>
    </div>
  </div>
  @endforeach
  <!--/ 1 new -->
</div>
<div style="height: 500px; background-color: white; " class="col-sm-3">
</div>
</div>
<!--/ new_vertical_index -->


<!-- 2 cols news -->
<div class="row text-center">
  <!-- 1 col-->
  <div class="col-lg-8 col-md-6 mb-4 tinmoi">
    <h4 class="card-title text-left title_3_lines_news">Tin mới</h4>
    @foreach($data_tinmoi as $item)
    <a href="{{ route('client.showdetail', $item->id)}}"><img src="/img/{{$item->image}}" style="width: 100%; object-fit:cover;"></a>
    <p class="text-justify card-text text-left description_3_lines_news"><a href="{{ route('client.showdetail', $item->id)}}">{{$item->description}}
    </a></p>
    @endforeach
    @foreach($data_tinmoi_line_2 as $item)
    <p class="text-justify card-text text-left description_3_lines_news"><a href="{{ route('client.showdetail', $item->id)}}">{{$item->description}}
    </a></p>
    @endforeach
  </div> 
  <!--/ 1 col-->
  
  <!-- 1 col-->
  <div class="col-lg-4 col-md-6 mb-4">
    <h4 class="card-title text-left title_3_lines_news">Tin nổi bật</h4>
    @foreach($data_random as $item)
    <a href="{{ route('client.showdetail', $item->id)}}"><img src="/img/{{$item->image}}"style="width: 100%; object-fit:cover;"></a>
    <p class="text-justify card-text text-left description_3_lines_news"><a href="{{ route('client.showdetail', $item->id)}}">{{$item->description}}
    </a></p>
    @endforeach
    @foreach($data_random_line_2 as $item)
    <p class="text-justify card-text text-left description_3_lines_news"><a href="{{ route('client.showdetail', $item->id)}}">{{$item->description}}
    </a></p>
    @endforeach
  </div> 
  <!--/ 1 col-->
  
  <!-- Daily week  -->
  <div class="row text-center mb-5">
    <div class="col-sm-12">
      @include('client.clientPartials.carousel')
    </div>
  </div>
  <!--/ Daily week -->

</div>
<!--/ 3 lines news -->
@endsection