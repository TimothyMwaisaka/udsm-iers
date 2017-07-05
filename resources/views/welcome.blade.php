<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UDSM IERS - Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- custom style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/custom.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="<?php echo asset("/bower_components/AdminLTE/dist/css/custom.css")?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")?>">

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
@if(Auth::guest())
    <body class="hold-transition skin-blue sidebar-mini layout-top-nav">
    <div class="wrapper">
        <!-- Header -->
    @include('header-welcome')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @include('heading')
                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    <section class="content">
                        <div class="callout callout-info row" style="padding: 90px 30px 110px 15px">
                            <div class="col-md-2">
                                <a href="#"><img src={{asset('img/udsm.png')}} alt="udsm" height="150px"></a>
                            </div>
                            <div class="col-md-10" style="font-size: 110%">
                                <h3>Wecome!</h3>
                                <p>IERS - Instructors Evaluation and Rating System is an online system for Quality
                                    Assurance
                                    Bureau (QAB) of the University of Dar es salaam (UDSM). The system is used to
                                    conduct
                                    instructors assessment, rating and evaluation. The aim of the system is to make
                                    rating
                                    and
                                    evaluation of instructors efficient and less time consuming</p>
                            </div>
                        </div>
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">USER LOGIN</h3>
                            </div>
                            <div class="box-body">

                                You are not logged in, to access IERS please <strong><a href="/login">LOGIN
                                        HERE</a></strong>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </section>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- Footer -->
        @include('footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
    </body>

@elseif( Auth::User()->hasRole(['Admin']) )
    <script>
        window.location.href = '{{url("/admin")}}';
    </script>
@elseif( Auth::User()->hasRole(['Student']) )
    <script>
        window.location.href = '{{url("/student")}}';
    </script>
@elseif( Auth::User()->hasRole(['Instructor']) )
    <script>
        window.location.href = '{{url("/instructor")}}';
    </script>
@else
    <div class="container" style="padding-top: 20px; margin: 0 50px;">
        <div class="callout callout-danger">
            <h4>Alert</h4>
            <p>No Role assigned to the user. Contact UIERS Administrators..</p>
        </div>
    </div>
    <script>
        setTimeout(function () {
            window.location.href = '{{url("/logout")}}';
        }, 7000);
    </script>
@endif
</html>
