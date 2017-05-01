<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IERS - {{ $data[0]->course_code }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/all.css") }}">
    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <!-- custom style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/custom.css") }}">
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
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">assessment form</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header assessment-form-header">
                            <h3 class="box-title">ASSESSMENT FORM: <span> {{ $data[0]->course_code ." - ". $data[0]->course_name }}</span></h3>
                        </div>
                        <div class="box-header assessment-form-header">
                            <p><h3 class="box-title">INSTRUCTOR: <span>{{ $data[0]->firstname ." ". $data[0]->lastname  }}</span></h3></p>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post">
                                {{ csrf_field() }}
                                <table class="table table-bordered">
                                    <tr>
                                        <th>QUESTIONS</th>
                                        <th>RATINGS</th>
                                    </tr>
                                    @foreach($data as $value)
                                        <tr>
                                            <td>{{ $value->content }}</td>
                                            <td>
                                                <div class="control-group">
                                                    <label class="control control--radio" style="width: 60px;">1
                                                        <input type="radio" name="radio[{{ $value->question_id }}]" value="1"/>
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                    <label class="control control--radio" style="width: 60px;">2
                                                        <input type="radio" name="radio[{{ $value->question_id }}]" value="2"/>
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                    <label class="control control--radio" style="width: 60px;">3
                                                        <input type="radio" name="radio[{{ $value->question_id }}]" value="3"/>
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                    <label class="control control--radio" style="width: 60px;">4
                                                        <input type="radio" name="radio[{{ $value->question_id }}]" value="4"/>
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                    <label class="control control--radio" style="width: 60px;">5
                                                        <input type="radio" name="radio[{{ $value->question_id }}]" value="5"/>
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <button type="submit" class="btn btn-primary btn-flat pull-right">Submit</button>
                            </form>
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

<!-- jQuery 2.2.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- DataTables -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
</body>
</html>
