<html lang="en" ng-app="copya.app" data-ng-init="activetab=='/'">
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
<body>
    @yield('content')
    <script src="/js/copya.js"></script>
</body>
</html>
