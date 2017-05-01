<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IERS - Edit Admins</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Header -->
@include('header')

<!-- Sidebar -->
@include('sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @include('heading')
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">add admins</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row" style="">
                <!-- right column -->
                <div class="col-md-8 col-md-offset-2">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">EDIT ADMIN</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="" method="post">
                            <div class="box-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="adminID" class="col-sm-2 control-label">Staff ID</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adminID" name="adminID" value="{{ $data[0]->admin_id }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adminFirstName" class="col-sm-2 control-label">First Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adminFirstName" name="adminFirstName" value="{{ $data[0]->firstname }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adminMiddleName" class="col-sm-2 control-label">Middle Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adminMiddleName" name="adminMiddleName" value="{{ $data[0]->middlename }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adminLastName" class="col-sm-2 control-label">Last Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adminLastName" name="adminLastName" value="{{ $data[0]->lastname }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                    <!-- general form elements disabled -->

                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('footer')
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->

</body>
</html>
