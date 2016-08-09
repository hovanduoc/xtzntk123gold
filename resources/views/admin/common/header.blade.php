<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! url('public/backend/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! url('public/backend/css/sb-admin.css') !!}" rel="stylesheet">
    <link href="{!! url('public/backend/css/colorbox.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! url('public/backend/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var base_url = "{!! url('/') !!}";
        var elfinder_url = '{!! url('public/assets/backend/elfinder/elfinder.php') !!}';
    </script>
    <!-- jQuery -->
    <script src="{!! url('public/backend/js/jquery.js') !!}"></script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('dashboard') !!}">CMS</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Chào  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href=""><i class="fa fa-fw fa-user"></i> Thông tin</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{!! url('logout') !!}"><i class="fa fa-fw fa-power-off"></i> Thoát</a>
                    </li>
                </ul>
            </li>
        </ul>