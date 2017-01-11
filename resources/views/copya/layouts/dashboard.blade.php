<html lang="en" ng-app="copya" ng-controller="CopyaCtrl">
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


    <!--[if lte IE 9]>
    <link href="assets/plugins/codrops-dialogFx/dialog.ie.css" rel="stylesheet" type="text/css" media="screen" />


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token()
        ]); ?>
    </script>


    <link href="js/copya/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="js/copya/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="js/copya/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="js/copya/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link id="lazyload_placeholder">
    <!-- BEGIN Pages CSS-->

    <link class="main-stylesheet" ng-href="@{{copya.layout.theme}}" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
    <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="js/copya/plugins/mapplic/css/mapplic-ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
        window.onload = function() {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
    <!-- Styles -->
    <link href="../node_modules/angular-ui-tree/dist/angular-ui-tree.css" rel="stylesheet">
    <link href="/css/copya-dashboard.css" rel="stylesheet">
    <style>
        .angular-ui-tree-handle{
            background: #f8faff;
            padding: 10px 10px;
            border: solid 1px #dae2ea
        }

        .angular-ui-tree-handle {
            background: #f8faff;
            border: 1px solid #dae2ea;
            color: #7c9eb2;
            padding: 10px 10px;
        }

        .angular-ui-tree-handle:hover {
            color: #438eb9;
            background: #f4f6f7;
            border-color: #dce2e8;
        }

        .angular-ui-tree-placeholder {
            background: #f0f9ff;
            border: 2px dashed #bed2db;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
    </style>
</head>
<body  class="fixed-header menu-pin" ng-class="{
'bg-master-lighter': is('copya.extra.timeline'),
'no-header': is('copya.social') || is('copya.calendar') || is('copya.maps.vector') || is('copya.maps.google'),
'menu-pin' : copya.layout.menuPin || is('boxed'),
'menu-behind' : copya.layout.menuBehind,
'box-layout' : is('boxed'),
'horizontal-menu': is('copya.layouts.horizontal'),
'rtl' : is('copya.layouts.rtl')
 }">
    @yield('content')
    <script src="/js/copya.app.js"></script>
</body>
</html>
