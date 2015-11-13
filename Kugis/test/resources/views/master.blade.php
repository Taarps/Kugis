<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="Norel IT test">
<meta name="author" content="Andris Briedis, 4andrisbriedis@gmail.com">

<link rel="shortcut icon" type="image/x-icon" href="//www.google.com/images/icons/product/sites-16.ico" />
<link rel="apple-touch-icon" href="http://www.gstatic.com/sites/p/ca0925/system/app/images/apple-touch-icon.png" type="image/png" />

<title>Detaļas - @yield('title')</title>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

<!-- Custom Fonts -->
<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<!-- Custom Fonts -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div id="wrapper">

	@include('nav')

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            @yield('page_title')
                            <small>@yield('page_subheadering')</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{{ route('parts') }}">Detaļas</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> @yield('page_title')
                            </li>
                            <li>
                                <img src="{{ asset('img/ajax-loader.gif') }}" alt="Lādējas..." id="mainGifLoader">
                            </li>
                            @yield('add_item')
                          
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                @yield('add_item_panel')

                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('js-scripts')
</body>

</html>
