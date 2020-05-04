<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content={{csrf_token()}}>

    <title>Outdoor APP</title>
    <link rel="stylesheet" href="/css/app.css"></link>
    <link rel="stylesheet" href="/dist/plugins/font-awesome/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">    
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">    
    <link rel="stylesheet" href="/dist/plugins/iCheck/flat/blue.css">    
    <link rel="stylesheet" href="/dist/plugins/morris/morris.css">    
    <link rel="stylesheet" href="/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="/dist/plugins/datepicker/datepicker3.css">    
    <link rel="stylesheet" href="/dist/plugins/daterangepicker/daterangepicker-bs3.css">    
    <link rel="stylesheet" href="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition sidebar-mini">
    @guest @yield('content') @else
    <div class="wrapper" id="app">        
    @include('layouts.header')        
    @include('layouts.sidebar') @yield('content')        
    <!-- @include('layouts.footer') -->
    </div>
    @endguest @yield('javascript')
    
</body>
</html>