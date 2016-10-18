<html lang="en" ng-app="copya" ng-controller="CopyaController">
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

    <!-- Styles -->
    <link href="/css/copya-dashboard.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body  class="fixed-header" ng-class="{
'bg-master-lighter': is('copya.extra.timeline'),
'no-header': is('copya.social') || is('copya.calendar') || is('copya.maps.vector') || is('copya.maps.google'),
'menu-pin' : copya.layout.menuPin || is('boxed'),
'menu-behind' : copya.layout.menuBehind,
'box-layout' : is('boxed'),
'horizontal-menu': is('copya.layouts.horizontal'),
'rtl' : is('copya.layouts.rtl')
 }">
    @yield('content')
    <script src="/js/copya.js"></script>
</body>
</html>
