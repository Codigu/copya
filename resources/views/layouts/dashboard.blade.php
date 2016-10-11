<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/plugins/summernote/css/summernote.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" media="screen">


    <!--[if lte IE 9]>
	<link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />

    <!-- Styles -->
    <link href="/css/copya-dashboard.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="fixed-header sidebar-visible">
@section('sidebar')
        <!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-40"><img src="/assets/copya/img/demo/social_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-10"><img src="/assets/copya/img/demo/email_app.svg" alt="socail">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-40"><img src="/assets/copya/img/demo/calendar_app.svg" alt="socail">
                </a>
            </div>
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-10"><img src="/assets/copya/img/demo/add_more.svg" alt="socail">
                </a>
            </div>
        </div>
    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="/assets/copya/img/logo_white.png" alt="logo" class="brand" data-src="/assets/copya/img/logo_white.png" data-src-retina="/assets/copya/img/logo_white_2x.png" width="78" height="22">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            @foreach($sidenav as $key => $nav)
                @if(count($nav) == 1)
                    @foreach($nav as $item)
                        <li class="m-t-30 ">
                            <a href="{{ route($item['nav_name'])  }}" class="detailed">
                                <span class="title">{{ ucfirst($item['nav_name']) }}</span>
                            </a>
                            <span class="bg-success icon-thumbnail"><i class="pg-{{ $item['nav_name'] }}"></i></span>
                        </li>
                    @endforeach
                @elseif(count($nav) > 1)
                    <li>
                        <a href="javascript:;">
                            <span class="title">{{ ucfirst($key) }}</span>
                            <span class=" arrow"></span>
                        </a>
                        <span class="icon-thumbnail"><i class="pg-{{ $key }}"></i></span>
                        <ul class="sub-menu">
                            @foreach($nav as $item)
                                <li>
                                    <a href="{{ route($item['nav_name'])  }}">{{   str_replace(".", " ",ucfirst($item['nav_name']) ) }}</a>
                                    <span class="icon-thumbnail">{{ substr($item['nav_name'], 0, 1) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->

            <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
        <!-- START HEADER -->
        <div class="header ">
            <!-- START MOBILE CONTROLS -->
            <div class="container-fluid relative">
                <!-- LEFT SIDE -->
                <div class="pull-left full-height visible-sm visible-xs">
                    <!-- START ACTION BAR -->
                    <div class="header-inner">
                        <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                            <span class="icon-set menu-hambuger"></span>
                        </a>
                    </div>
                    <!-- END ACTION BAR -->
                </div>
                <div class="pull-center hidden-md hidden-lg">
                    <div class="header-inner">
                        <div class="brand inline">
                            <img src="/assets/copya/img/logo.png" alt="logo" data-src="/assets/copya/img/logo.png" data-src-retina="/assets/copya/img/logo_2x.png" width="78" height="22">
                        </div>
                    </div>
                </div>
                <!-- RIGHT SIDE -->
                <div class="pull-right full-height visible-sm visible-xs">
                    <!-- START ACTION BAR -->
                    <div class="header-inner">
                        <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview" data-toggle-element="#quickview">
                            <span class="icon-set menu-hambuger-plus"></span>
                        </a>
                    </div>
                    <!-- END ACTION BAR -->
                </div>
            </div>
            <!-- END MOBILE CONTROLS -->
            <div class=" pull-left sm-table hidden-xs hidden-sm">
                <div class="header-inner">
                    <div class="brand inline">
                        <img src="/assets/copya/img/logo.png" alt="logo" data-src="/assets/copya/img/logo.png" data-src-retina="/assets/copya/img/logo_2x.png" width="78" height="22">
                    </div>
                    <!-- START NOTIFICATION LIST -->
                    <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
                        <li class="p-r-15 inline">
                            <div class="dropdown">
                                <a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
                                    <span class="bubble"></span>
                                </a>
                                <!-- START Notification Dropdown -->
                                <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                                    <!-- START Notification -->
                                    <div class="notification-panel">
                                        <!-- START Notification Body-->
                                        <div class="notification-body scrollable">
                                            <!-- START Notification Item-->
                                            <div class="notification-item unread clearfix">
                                                <!-- START Notification Item-->
                                                <div class="heading open">
                                                    <a href="#" class="text-complete pull-left">
                                                        <i class="pg-map fs-16 m-r-10"></i>
                                                        <span class="bold">Carrot Design</span>
                                                        <span class="fs-12 m-l-10">David Nester</span>
                                                    </a>
                                                    <div class="pull-right">
                                                        <div class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                                                            <div><i class="fa fa-angle-left"></i>
                                                            </div>
                                                        </div>
                                                        <span class=" time">few sec ago</span>
                                                    </div>
                                                    <div class="more-details">
                                                        <div class="more-details-inner">
                                                            <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation <br>
                                                                distinguishes between <br>
                                                                A leader and a follower.”</h5>
                                                            <p class="small hint-text">
                                                                Commented on john Smiths wall.
                                                                <br> via pages framework.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Notification Item-->
                                                <!-- START Notification Item Right Side-->
                                                <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                                                    <a href="#" class="mark"></a>
                                                </div>
                                                <!-- END Notification Item Right Side-->
                                            </div>
                                            <!-- START Notification Body-->
                                            <!-- START Notification Item-->
                                            <div class="notification-item  clearfix">
                                                <div class="heading">
                                                    <a href="#" class="text-danger pull-left">
                                                        <i class="fa fa-exclamation-triangle m-r-10"></i>
                                                        <span class="bold">98% Server Load</span>
                                                        <span class="fs-12 m-l-10">Take Action</span>
                                                    </a>
                                                    <span class="pull-right time">2 mins ago</span>
                                                </div>
                                                <!-- START Notification Item Right Side-->
                                                <div class="option">
                                                    <a href="#" class="mark"></a>
                                                </div>
                                                <!-- END Notification Item Right Side-->
                                            </div>
                                            <!-- END Notification Item-->
                                            <!-- START Notification Item-->
                                            <div class="notification-item  clearfix">
                                                <div class="heading">
                                                    <a href="#" class="text-warning-dark pull-left">
                                                        <i class="fa fa-exclamation-triangle m-r-10"></i>
                                                        <span class="bold">Warning Notification</span>
                                                        <span class="fs-12 m-l-10">Buy Now</span>
                                                    </a>
                                                    <span class="pull-right time">yesterday</span>
                                                </div>
                                                <!-- START Notification Item Right Side-->
                                                <div class="option">
                                                    <a href="#" class="mark"></a>
                                                </div>
                                                <!-- END Notification Item Right Side-->
                                            </div>
                                            <!-- END Notification Item-->
                                            <!-- START Notification Item-->
                                            <div class="notification-item unread clearfix">
                                                <div class="heading">
                                                    <div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                                                        <img width="30" height="30" data-src-retina="/assets/copya/img/profiles/1x.jpg" data-src="/assets/copya/img/profiles/1.jpg" alt="" src="/assets/copya/img/profiles/1.jpg">
                                                    </div>
                                                    <a href="#" class="text-complete pull-left">
                                                        <span class="bold">Revox Design Labs</span>
                                                        <span class="fs-12 m-l-10">Owners</span>
                                                    </a>
                                                    <span class="pull-right time">11:00pm</span>
                                                </div>
                                                <!-- START Notification Item Right Side-->
                                                <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                                                    <a href="#" class="mark"></a>
                                                </div>
                                                <!-- END Notification Item Right Side-->
                                            </div>
                                            <!-- END Notification Item-->
                                        </div>
                                        <!-- END Notification Body-->
                                        <!-- START Notification Footer-->
                                        <div class="notification-footer text-center">
                                            <a href="#" class="">Read all notifications</a>
                                            <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                                <i class="pg-refresh_new"></i>
                                            </a>
                                        </div>
                                        <!-- START Notification Footer-->
                                    </div>
                                    <!-- END Notification -->
                                </div>
                                <!-- END Notification Dropdown -->
                            </div>
                        </li>
                        <li class="p-r-15 inline">
                            <a href="#" class="icon-set clip "></a>
                        </li>
                        <li class="p-r-15 inline">
                            <a href="#" class="icon-set grid-box"></a>
                        </li>
                    </ul>
                    <!-- END NOTIFICATIONS LIST -->
                    <a href="#" class="search-link" data-toggle="search"><i class="pg-search"></i>Type anywhere to <span class="bold">search</span></a> </div>
            </div>
            <div class=" pull-right">
                <div class="header-inner">
                    <a href="#" class="btn-link icon-set menu-hambuger-plus m-l-20 sm-no-margin hidden-sm hidden-xs" data-toggle="quickview" data-toggle-element="#quickview"></a>
                </div>
            </div>
            <div class=" pull-right">
                <!-- START User Info-->
                <div class="visible-lg visible-md m-t-10">
                    <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                        <span class="text-master">{{ ucfirst(Auth::user()->name) }}</span>
                    </div>
                    <div class="dropdown pull-right">
                        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="/assets/copya/img/profiles/avatar.jpg" alt="" data-src="/assets/copya/img/profiles/avatar.jpg" data-src-retina="/assets/copya/img/profiles/avatar_small2x.jpg" width="32" height="32">
            </span>
                        </button>
                        <ul class="dropdown-menu profile-dropdown" role="menu">
                            <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
                            </li>
                            <li><a href="#"><i class="pg-outdent"></i> Feedback</a>
                            </li>
                            <li><a href="#"><i class="pg-signals"></i> Help</a>
                            </li>
                            <li class="bg-master-lighter">
                                <a href="#" class="clearfix">
                                    <span class="pull-left">Logout</span>
                                    <span class="pull-right"><i class="pg-power"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END User Info-->
            </div>
        </div>
        <!-- END HEADER -->
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper">
            <!-- START PAGE CONTENT -->
            <div class="content ">
                <!-- START JUMBOTRON -->
                <div class="jumbotron" data-pages="parallax">
                    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                        <div class="inner">
                            <!-- START BREADCRUMB -->
                            <ul class="breadcrumb">
                                <li>
                                    <p><a href="{{ route('dashboard') }}">{{ Config::get('copya.admin_path') }}</a></p>
                                </li>
                                <li>
                                    {{ Route::currentRouteName() }}
                                </li>
                            </ul>
                            <!-- END BREADCRUMB -->
                        </div>
                    </div>
                </div>
                <!-- END JUMBOTRON -->
                <!-- START CONTAINER FLUID -->
                <div class="container-fluid container-fixed-lg" id="app">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    @yield('content')
                            <!-- END PLACE PAGE CONTENT HERE -->
                </div>
                <!-- END CONTAINER FLUID -->
            </div>
            <!-- END PAGE CONTENT -->
            <!-- START COPYRIGHT -->
            <!-- START CONTAINER FLUID -->
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg footer">
                <div class="copyright sm-text-center">
                    <p class="small no-margin pull-left sm-pull-reset">
                        <span class="hint-text">Copyright &copy; 2014 </span>
                        <span class="font-montserrat">REVOX</span>.
                        <span class="hint-text">All rights reserved. </span>
                        <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
                    </p>
                    <p class="small no-margin pull-right sm-pull-reset">
                        <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END COPYRIGHT -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->


    <!-- BEGIN VENDOR JS -->

    <script src="/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    {{--<script src="/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>--}}
    <script src="/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="/plugins/classie/classie.js"></script>
    <script src="/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script type="text/javascript" src="/plugins/jquery-autonumeric/autoNumeric.js"></script>
    <script type="text/javascript" src="/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
    <script src="/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="/plugins/summernote/js/summernote.min.js" type="text/javascript"></script>
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/plugins/bootstrap-typehead/typeahead.bundle.min.js"></script>
    <script src="/plugins/bootstrap-typehead/typeahead.jquery.min.js"></script>
    <script src="/plugins/handlebars/handlebars-v4.0.5.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="/assets/copya/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="/assets/copya/js/form_elements.js" type="text/javascript"></script>
    <script src="/assets/copya/js/scripts.js" type="text/javascript"></script>

    <!-- Scripts -->

    <script src="/js/copya.js"></script>
</body>
</html>
