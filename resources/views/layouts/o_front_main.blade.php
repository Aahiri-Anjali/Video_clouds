<html dir="ltr" lang="en"><head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
      <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
      <meta name="robots" content="noindex,nofollow">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Video Clouds</title>
      <style>
        
        </style>
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front_assets/assets/images/favicon.png')}}">
      <link href="{{asset('front_assets/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
      <link href="{{asset('front_assets/dist/css/style.min.css')}}" rel="stylesheet">
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
      @stack('link')
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
    <body>

        <div class="header-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-3 pos-s">
                        <button class="menu-toggle">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </button>
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse">
                                <ul id="menu-bootstrap-menu" class="nav navbar-nav"><li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-82" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-82 active"><a href="https://hasnaanajmi.com/TM/veenblog/">Home</a></li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-83" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-83"><a href="https://hasnaanajmi.com/TM/veenblog/category/lifestyle/">Lifestyle</a></li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-84" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-84"><a href="https://hasnaanajmi.com/TM/veenblog/category/travel/">Travel</a></li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-85" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-85"><a href="https://hasnaanajmi.com/TM/veenblog/category/fashion/">Fashion</a></li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-86 dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Pages <span class="caret"></span></a>
                                    <ul role="menu" class=" dropdown-menu">
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-87" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-87"><a href="https://hasnaanajmi.com/TM/veenblog/2020/10/20/">Archive</a></li>
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-88" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-88"><a href="https://hasnaanajmi.com/TM/veenblog/author/admin/">Author</a></li>
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-89"><a href="https://hasnaanajmi.com/TM/veenblog/category/lifestyle/">Category</a></li>
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-90"><a href="https://hasnaanajmi.com/TM/veenblog/tag/culture/">Tag</a></li>
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-91" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-91"><a href="https://hasnaanajmi.com/TM/veenblog/?s=The">Search Results</a></li>
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-92" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-92"><a href="https://hasnaanajmi.com/TM/veenblog/error">404</a></li>
                                    </ul>
                                    </li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-97"><a href="https://hasnaanajmi.com/TM/veenblog/about/">About</a></li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-100" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-100"><a href="https://hasnaanajmi.com/TM/veenblog/contact/">Contact</a></li>
                                </ul>							    
                            </div>
                                                            
                        </nav>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-9 text-md-center">
                        <div class="search-toggle">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="textwidget custom-html-widget"><ul class="social-icons-menu list-unstyled"><li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-instagram"></i></a></li>
<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
<li><a href="#"><i class="fa fa-youtube"></i></a></li>
</ul></div>					    </div>
                </div>	
            </div>
        </div>

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