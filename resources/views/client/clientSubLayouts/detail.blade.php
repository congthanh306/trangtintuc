@extends('client.clientLayout.master')
@foreach($data as $item)
@section('title')
{{$item->title}}
@endsection
@section('content')
<div class="row">

  <!-- Post Content Column -->
  <div class="col-lg-8">


    <!-- Title -->
    <h1 class="mt-4">{{$item->title}}</h1>

    <!-- Author -->
    <p class="lead">
      by
      <a href="#">{{$item->author}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d h:i:sa') }}</p>

    <hr>

    <!-- Post Content -->
    <p class="lead">{!!$item->content!!}</p>

    <!-- Comments Form -->
    <form action="#" id="submitComment">
      @csrf
      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <div class="form-group">
            <textarea class="form-control" rows="3" name="content" id="content" required></textarea>
          </div>
          <input type="hidden" name="idNews" value="{{ $item->id }}">
          @if(Auth::user())
          <button type="submit" class="btn btn-info btn-rounded my-3 btn-block" id="InsertCommentbtn">Submit</button>
          @endif
          @if(!Auth::user())
          <div class="form-group">
            <small><p class="text-info pl-1">You must log in to comment</p></small>
          </div>
          @endif
        </div>
      </div>
    </form>    
    @endforeach
    <!--/ Comments Form -->

    <!-- Single Comment -->
    @foreach($dataComment as $item)
    <div>
      <div class="media mb-4" id="commentDiv">
        <div class="media-body">
          <div id="usernameComment">
            <strong class="mt-0 usernameComment">{{ $nameUserChange[$item->idUser]}}</strong> 
            <div class="contentComment">{{$item->content}}</div>
          </div>

        </div>
        <a class=" commentAction" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item editBtn"><i class="fas fa-pencil-alt"></i> Edit...</a>
          <a class="dropdown-item deleteBtn" data-href="{{$item->id}}"><i class="fas fa-trash-alt"></i> Delete...</a>
        </div>
      </div>
      <p id="usernameCommentTime">
        <i class="far fa-thumbs-up"></i>
        <small> {{ Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</small>
      </p>
    </div>


    <div class="formEditComment mb-3" hidden="true">
        <textarea class="form-control mb-1 content" name="content">{{$item->content}}</textarea>
        <input type="hidden" class="idComment" name="idComment" value="{{$item->id}}">
        @foreach($data as $item)
        <input type="hidden" class="idNews" name="idNews" value="{{ $item->id }}">
        @endforeach
        <a class="btn btn-success btn-block saveEditComment">Save</a> 
    </div>
    @endforeach
    @include('client.clientPartials.login')




  </div>
</div>
<!-- /.row -->

@endsection
