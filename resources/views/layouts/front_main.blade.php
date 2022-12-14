<html dir="ltr" lang="en">
<head>
  <!-- CSS only -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Video Clouds</title>
    <!-- Favicon icon -->
   
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front_assets/assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('front_assets/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('front_assets/dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
     @stack('link')
     <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
      <script>
      window.OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "41ec3491-eeb3-43dd-8ec0-1d5181875d58",
        });
      });
      </script>
</head>
  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" style="display: none;">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="mini-sidebar" data-sidebar-position="absolute" data-header-position="absolute"  class="mini-sidebar">
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="index.html">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="{{asset('front_assets/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" width="25"> VideoClouds
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2">
                <!-- dark Logo text -->
                {{-- <img src="{{asset('front_assets/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo"> --}}
                {{-- <i class="mdi-account-plus"></i> --}}
              </span>
            </a>
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
        
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"><i class="mdi mdi-menu font-24"></i></a>
              </li>
              <!-- ============================================================== -->
              <!-- create new -->
              <!-- ============================================================== -->
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link waves-effect waves-light" href="{{route('dashboard')}}">
                  <span class="d-none d-md-block"><i class="fa-solid fa-house"></i> {{__('message.home')}}</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block"><i class="fa-regular fa-grid-2"></i> {{__('message.category')}} <i class="fa fa-angle-down"></i></span>
                  <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach($categories as $category)
                  @if($category->status == '1')
                  <li><a class="dropdown-item" href="{{route('categoryWiseVideo',['id'=>$category->id])}}">{{$category->name}}</a></li>
                  @endif
                  @endforeach
                </ul>
              </li>

              <li class="nav-item d-none d-lg-block">
                <a class="nav-link waves-effect waves-light" href="{{route('importexcelShow')}}">
                  <span class="d-none d-md-block"><i class="fa-solid fa-file-import"></i> {{__('message.import')}}</span>
                </a>
              </li>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link waves-effect waves-light" href="{{route('displayexcel')}}">
                  <span class="d-none d-md-block"><i class="fa-solid fa-file-export"></i> {{__('message.export')}}</span>
                </a>
              </li>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link waves-effect waves-light" href="{{route('laravelform.show')}}">
                  <span class="d-none d-md-block">  {{__('message.laravel')}}</span>
                </a>
              </li>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link waves-effect waves-light" href="{{route('stripe.show')}}">
                  <span class="d-none d-md-block"> Stripe Gateway </span>
                </a>
              </li>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link waves-effect waves-light" href="{{route('stripe.list')}}">
                  <span class="d-none d-md-block"> Stripe Payment List </span>
                </a>
              </li>
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link waves-effect waves-light" href="{{route('cronjob.show')}}">
                  <span class="d-none d-md-block"> Crone Job </span>
                </a>
              </li>
            
                        
              <li class="nav-item search-box">
                <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify fs-4"></i></a>
                <form class="app-search position-absolute">
                  <input type="text" class="form-control" placeholder="Search &amp; enter">
                  <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                </form>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- Comment -->
              <!-- ============================================================== -->
              

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Config::get('languages')[App::getLocale()] }}                            </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>                                    @endif
                    @endforeach                      
                </ul>
              </li>
    
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="font-24 mdi mdi-comment-processing"></i>
                </a>
                <ul class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    animated
                    bounceInDown
                  " aria-labelledby="2">
                  <ul class="list-style-none">
                    <li>
                      <div class="">
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span class="
                                btn btn-success btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-calendar text-white fs-4"></i></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Event today</h5>
                              <span class="mail-desc">Just a reminder that event</span>
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span class="
                                btn btn-info btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-settings fs-4"></i></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Settings</h5>
                              <span class="mail-desc">You can customize this template</span>
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span class="
                                btn btn-primary btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-account fs-4"></i></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Pavan kumar</h5>
                              <span class="mail-desc">Just see the my admin!</span>
                            </div>
                          </div>
                        </a>
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            <span class="
                                btn btn-danger btn-circle
                                d-flex
                                align-items-center
                                justify-content-center
                              "><i class="mdi mdi-link fs-4"></i></span>
                            <div class="ms-2">
                              <h5 class="mb-0">Luanch Admin</h5>
                              <span class="mail-desc">Just see the my new admin!</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </li>
                  </ul>
                </ul>
              </li>
      
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{$data->image!=""?$data->image:$data->avatar}}" alt="user" class="rounded-circle" width="31">               
                </a>
                <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">               
                  <a class="dropdown-item" href="{{route('userInfo')}}"><i class="mdi mdi-account me-1 ms-1"></i> {{__('message.profile')}}</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('changePassword')}}"><i class="mdi mdi-account me-1 ms-1"></i> {{__('message.changepass')}}</a>
                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('front-logout-form').submit();">
                      <i class="fa fa-power-off me-1 ms-1"></i> {{__('message.logout')}}
                  </a>

                  <form id="front-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  <div class="ps-4 p-10">
                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">View Profile</a>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4 in">
              <li class="sidebar-item selected">
                <a class="sidebar-link waves-effect waves-dark sidebar-link active" href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
              </li>
             
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu"> {{__('message.widget')}}</span></a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu"> {{__('message.tables')}}</span></a>
              </li>        
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu"> {{__('message.buttons')}}</span></a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu"> {{__('message.elements')}}</span></a>
              </li>                          
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
       
        <div class="container-fluid">
          @yield('content')
        </div>
       
        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
     
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="{{asset('front_assets/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('front_assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('front_assets/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('front_assets/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('front_assets/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
     <script src="{{asset('front_assets/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <!-- Charts js Files -->
    <script src="{{asset('front_assets/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('front_assets/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('front_assets/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('front_assets/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('front_assets/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('front_assets/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('front_assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('front_assets/dist/js/pages/chart/chart-page-init.js')}}"></script>
    @stack('js')
<div class="flotTip" style="position: absolute; left: 1028px; top: 617.013px; display: none;"></div>
</body>
</html>