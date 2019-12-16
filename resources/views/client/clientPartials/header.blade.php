<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">JVB báo điện tử</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('client.index') }}"><i class="fas fa-home"></i>    </a>
        </li>
        @foreach($categories as $item)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client.type', $item->id) }}">{{ $item->name }}</a>
        </li>
        @endforeach
        <li>
          @if(!Auth::user())
         <li><a class="nav-link" href="" data-toggle="modal" data-target="#modalLRForm">|  <i class="fas fa-user"></i></a></li> 
          @endif
          @if(Auth::user())
          <li><a class="nav-link" href="">|  {{ Auth::user()->username }}</a></li>
          <li><a class="nav-link" href="{{route('client.logout')}}"><i class="fas fa-sign-out-alt"></i></a></li>
          @endif
        </li>
      </ul>
    </div>
  </div>

</nav>
  @include('client.clientPartials.login')