<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('public/dashboard/profile_images/' . Auth::user()->image)}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->username}}</p>
        @if(Auth::user()->role_id == '1')
        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        @else
        <a href="#"><i class="fa fa-circle text-danger"></i>Offline</a>
        @endif
      </div>
    </div>     
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">        
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Layout Options</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
      </li>       
      <li class="header">LABELS</li>        
      <li><a href="{{route('profile_view')}}"><i class="fa fa-user text-aqua"></i> <span>My Profile</span></a></li>
      <li><a href="{{route('users')}}"><i class="fa fa-user text-aqua"></i> <span>All Users</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>