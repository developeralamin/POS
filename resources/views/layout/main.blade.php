@extends('layout.primary')

@section('page_body')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                 <!--  dashoboard not work thats why use user-->
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Mini Pos</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @if($main_menu == 'Dashboard') active @endif">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <!--  dashoboard not work thats why use user-->
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

 <!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item @if($main_menu == 'Users') active @endif">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-users"></i>
         <span>Users</span>
    </a>
<div id="collapseTwo" class="collapse @if($main_menu == 'Users') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
     <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @if($sub_menu == 'Groups') active @endif" href="{{ url('groups') }}">Groups</a>
         <a class="collapse-item @if($sub_menu == 'Users') active @endif" href="{{url('users')}}">Users</a>
         </div>
    </div>
</li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item @if($main_menu == 'Products') active @endif ">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"aria-expanded="true" aria-controls="collapseUtilities">
                    
    <i class="fas fa-fw fa-bars"></i>
            <span>Products</span>
     </a>
<div id="collapseUtilities" class="collapse @if($main_menu == 'Products') 
  show @endif" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
 <div class="bg-white py-2 collapse-inner rounded">
                        
        <a class="collapse-item @if($sub_menu == 'Categories') active @endif" href="{{url('categories')}}">Categories</a>
        <a class="collapse-item @if($sub_menu == 'Product') active @endif" href="{{url('products') }}">Products</a>
        <a class="collapse-item @if($sub_menu == 'Stocks') active @endif" href="{{route('stocks') }}">Stocks</a>
                        
                
    </div>
</div>
</li>



<li class="nav-item @if($main_menu == 'Reports') active @endif ">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesthree"aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Reports</span>
  </a>
<div id="collapseUtilitiesthree" class="collapse @if($main_menu == 'Reports') 
  show @endif" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    
    <div class="bg-white py-2 collapse-inner rounded">                     
    <a class="collapse-item @if($sub_menu == 'Days_report') active @endif" href="{{route('reports.days')}}">Days Report</a>

    <a class="collapse-item @if($sub_menu == 'Sales') active @endif" href="{{route('reports.sales')}}">Sales</a>

    <a class="collapse-item @if($sub_menu == 'Purchases') active @endif" href="{{route('reports.purchases') }}">Purchase</a>

    <a class="collapse-item @if($sub_menu == 'Payments') active @endif" href="{{route('reports.payments') }}">Payments</a>

    <a class="collapse-item @if($sub_menu == 'Receipts') active @endif" href="{{route('reports.receipts') }}">Receipts</a>
                             
    </div>
    </div>
</li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                           {{--  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2"> --}}
                            {{-- <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div> --}}
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

<!-- Nav Item - Search Dropdown (Visible Only XS) -->
<li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
            <i class="fas fa-search fa-fw"></i>
            </a>
                            <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                               
        <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                         </button>
                        </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
                      
     <div class="topbar-divider d-none d-sm-block"></div>

<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="mr-2 d-none d-lg-inline text-gray-600 small">
            {{ optional(Auth::user())->name }}
</span>
<img class="img-profile rounded-circle" src="{{  asset('assets/img/undraw_profile.svg')}}">
</a>

<!-- Dropdown - User Information -->
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"aria-labelledby="userDropdown">
<a class="dropdown-item" href="#">
  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
    Profile
 </a>
                        
    <a class="dropdown-item" href="#">
             <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Activity Log
            </a>
<div class="dropdown-divider"></div>
 <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
             Logout
   </a>
 </div>
</li>
</ul>
 </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                     @if ( session()->get('message') )
                        <div class="alert alert-success" role="alert">
                          {{ session()->get('message') }}
                        </div>
                      @endif

                    @yield('main_content')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @stop