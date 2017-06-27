<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IERS - Report</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- custom style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/custom.css") }}">
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

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('header')
<!-- Left side column. contains the logo and sidebar -->
@include('sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @include('heading')
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">report</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header col-xs-9 col-lg-offset-1">
                            <h3 class="box-title" style="margin-left: 12px">COURSE ASSESSMENT REPORT</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-9 col-lg-offset-1">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="6">SUMMARY</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>COURSE CODE: {{ $data[0]->course_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>COURSE NAME: {{ $data[0]->course_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            INSTRUCTOR: {{ $data[0]->name. " " .$data[0]->middlename. " " .$data[0]->lastname}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            COLLEGE: {{ $data[0]->college_short_name." - ".$data[0]->college_name }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-9 col-lg-offset-1">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th colspan="6">SCORES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Scale</th>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <th>Occurence</th>
                                        <td>{{ $count_one }}</td>
                                        <td>{{ $count_two }}</td>
                                        <td>{{ $count_three }}</td>
                                        <td>{{ $count_four }}</td>
                                        <td>{{ $count_five }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>{{ $count_one }}</td>
                                        <td>{{ $count_two * 2 }}</td>
                                        <td>{{ $count_three * 3 }}</td>
                                        <td>{{ $count_four * 4 }}</td>
                                        <td>{{ $count_five *5}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">AVERAGE SCORE: {{ $average }}</td>
                                        <td colspan="5">
                                            <strong>
                                                @if($average>=1 && $average<2)
                                                    Very Poor
                                                @elseif($average>=2 && $average<3)
                                                    Poor
                                                @elseif($average>=3 && $average<4)
                                                    Satisfactory
                                                @elseif($average>=4 && $average<5)
                                                    Good
                                                @elseif($average>=5)
                                                    Excellent
                                                @endif
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('footer')
</div>
<!-- ./wrapper -->
<script>
    Morris.Bar({
        element: 'bar-chart',
        data: [
            {y: '1', a: 30},
            {y: '2', a: 75},
            {y: '3', a: 50},
            {y: '4', a: 75},
            {y: '5', a: 50}
        ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Occurence']
    });

</script>
<!-- jQuery 2.2.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>

<!-- SlimScroll -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}"></script>
<!-- page script -->

</body>
</html>
