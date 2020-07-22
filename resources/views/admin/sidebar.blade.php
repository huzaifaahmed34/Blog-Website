
@section('sidebar') 
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><span style="color:#FED189;">We</span><span style="color:#058ABF;">Blog</span>
    </span></a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
               
              </p>
            </a>

          </li>
 

@if(Auth::user()->role_id!=3 )
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

      Categories
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/CategoryAdd')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Categories</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('admin/CategoryView')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Categories</p>
                </a>
              </li>
               
            </ul>
          </li>
   <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

     Sub Categories
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/SubCategoryAdd')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Categories</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('admin/SubCategoryView')}}"  class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sub Categories</p>
                </a>
              </li>
               
            </ul>
          </li>
               
   @endif

               <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

      Posts
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/PostAdd')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Posts</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('admin/PostView')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Posts</p>
                </a>
              </li>
               
            </ul>
          </li>


@if(Auth::user()->role_id==1)
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
      <i class="nav-icon fas fa-copy"></i>
              <p>

      Users
 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/CategoryAdd')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('admin/CategoryView')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
               
            </ul>
          </li>
@endif
   







        






        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection('sidebar')