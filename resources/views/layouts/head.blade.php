

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Adamina" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-arial-caps/css/bpg-arial-caps.min.css">
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-glaho-web/css/bpg-glaho-web.min.css">
    <!-- CSS -->
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon/flaticon.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <!-- Nav Menu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav-menu.css') }}">
    <!-- Void Mega Menu -->
    <link rel="stylesheet" href="{{ asset('assets/css/vmm.menu.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ripple.min.css') }}">
    <!-- Main StyleSheet CSS -->

    <link rel="stylesheet" href="{{ asset('assets/css/style.css?v=') }}{{ random_int(0,5000) }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/settings.css') }}">
    <!-- REVOLUTION LAYERS STYLES -->


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/layers.css') }}">

    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/navigation.css') }}">


</head>
