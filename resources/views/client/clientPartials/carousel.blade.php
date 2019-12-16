<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <h4 class="card-title text-left title_3_lines_news">Tiêu điểm tuần</h4>
  <div class="container carousel-inner no-padding">
    <div class="carousel-item active">
      @foreach($data_daily_week as $item)
      <div class="col-xs-3 col-sm-3 col-md-3 _1carousel">
        <a href="{{ route('client.showdetail', $item->id)}}"><img src="/img/{{$item->image}}" style="width:250px;height:150px; object-fit:cover;"  class="_1carousel_img"></a>
        <div class="_1carousel_grad"></div>
        <a href="{{ route('client.showdetail', $item->id)}}" ><p class="_1carousel_title">{{$item->title}}</p></a>
      </div> 
      @endforeach  
    </div>

    <div class="carousel-item">
      @foreach($data_daily_week_2 as $item)
      <div class="col-xs-3 col-sm-3 col-md-3 _1carousel">
       <a href="{{ route('client.showdetail', $item->id)}}"><img src="/img/{{$item->image}}" style="width:250px;height:150px; object-fit:cover;"  class="_1carousel_img"></a>
       <div class="_1carousel_grad"></div>
       <a href="{{ route('client.showdetail', $item->id)}}"><p class="_1carousel_title">{{$item->title}}</p></a>
     </div>    
     @endforeach  
   </div>

   <div class="carousel-item">
    @foreach($data_daily_week_3 as $item)
    <div class="col-xs-3 col-sm-3 col-md-3 _1carousel">
     <a href="{{ route('client.showdetail', $item->id)}}"><img src="/img/{{$item->image}}" style="width:250px;height:150px; object-fit:cover;"  class="_1carousel_img"></a>
     <div class="_1carousel_grad"></div>
     <a href="{{ route('client.showdetail', $item->id)}}" ><p class="_1carousel_title">{{$item->title}}</p></a>
   </div>    
   @endforeach  
 </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>