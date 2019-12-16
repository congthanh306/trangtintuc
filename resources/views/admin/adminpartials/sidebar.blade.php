<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  
  
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.staff.index') }}">
       <i class="fas fa-user-cog"></i>
       <span>Staff</span></a>
     </li>

     <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.news.index') }}">
        <i class="fas fa-newspaper"></i>
        <span>Article</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
          <i class="fas fa-layer-group"></i>
          <span>Category</span></a>
        </li>
      </ul>