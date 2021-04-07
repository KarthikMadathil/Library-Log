<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
        <div class="d-table m-auto">
          <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="/admin/images/logo.gif" alt="marian Logo">
          <span class="d-none d-md-inline ml-1">Marian Library Log</span>
        </div>
      </a>
      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
      </a>
    </nav>
  </div>
<div class="nav-wrapper">
  <ul class="nav flex-column">
    <li class="nav-item ">
      <a class="nav-link " id="dashb_" href="{{route('home')}}">
        <i class="material-icons">edit</i>
        <span>Dashboard</span>
      </a>
    </li>
        <li class="nav-item">
      <a class="nav-link " id="Report_"href="{{route('report')}}">
        <i class="material-icons">vertical_split</i>
        <span>Report</span>
      </a>
    </li>
    @if(auth()->user()->isAdmin == 1)
    <li class="nav-item">
      <a class="nav-link " id="log_" href="{{route('log')}}">
        <i class="material-icons">view_module</i>
        <span>Log &amp; Register</span>
      </a>
    </li>
    <li class="nav-item " >
      <a class="nav-link " id="AddStud_" href="{{route('student.create')}}">
        <i class="material-icons">note_add</i>
        <span>Add Student</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link " href="{{route('public_view')}}" target="_blank"  rel="noopener noreferrer">
        <i class="material-icons">table_chart</i>
        <span>Public View</span>
      </a>
    </li>
    
    @endif
    <!--
    <li class="nav-item">
      <a class="nav-link " href="user-profile-lite.html">
        <i class="material-icons">person</i>
        <span>User Profile</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="errors.html">
        <i class="material-icons">error</i>
        <span>Errors</span>
      </a>
    </li>
  -->
  </ul>
</div>


</aside>
