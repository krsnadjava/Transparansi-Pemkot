<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring Dana Pemerintah Kota Bandung</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('asset/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! asset('asset/css/metisMenu.min.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('asset/css/style.css') !!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{!! asset('asset/css/morris.css') !!}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{!! asset('asset/css/dataTables.bootstrap.css') !!}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{!! asset('asset/css/dataTables.responsive.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('asset/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!! url() !!}">Monitoring Dana Pemerintah Kota Bandung</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <br>
                    <img src="{!! asset('/asset/img/logo-pemkot.png') !!}" alt="" class="img-responsive"/>
                    <br>
                    <div class="panel panel-default" id="sidemenu">
                        <div class="panel-heading">Filters</div>
                        <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label for="tampil">Tampilkan</label>
                                    <select class="form-control" id="tampil" onchange="if(this[this.selectedIndex].value!=='')location.href=this.value;">
                                        <option value="{!! url() !!}">Semua</option>
                                        <option value="{!! url() !!}/dinas/{{ $jenis }}/tipe/area/id">Dinas</option>
                                        <option value="{!! url() !!}/kecamatan/{{ $jenis }}/tipe/area/id">Kecamatan</option>
                                        <option value="{!! url() !!}/bumd/{{ $jenis }}/tipe/area/id">BUMD</option>
                                        <option value="{!! url() !!}/other/{{ $jenis }}/tipe/area/id">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tampil">Tipe Dana</label>
                                    <select class="form-control" id="tampil" onchange="if(this[this.selectedIndex].value!=='')location.href=this.value;">
                                        <option value="{!! url() !!}">Tipe Dana</option>
                                        <option value="{!! url() !!}/transparansi/pendapatan">Pendapatan</option>
                                        <option value="{!! url() !!}/transparansi/belanja">Belanja</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Hanya tampilkan</label>
                                    <div class="checkbox">
                                        <i class="fa fa-caret-right"></i>
                                        <label>
                                            <input type="checkbox" checked> <a>Dinas</a>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked> <a>Kecamatan</a>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked> <a>BUMD</a>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked> <a>Lain-lain</a>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Tipe Dana</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="belanja[]" type="checkbox" checked> <a>Belanja Tidak Langsung</a>
                                        </label>
                                    </div>
                                    <div class="checkbox" style="margin-left:7px;">
                                        <label>
                                            <input name="belanja[]" type="checkbox" checked> Tunjangan Pegawai
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="belanja[]" type="checkbox" checked> <a>Belanja Langsung</a>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" onClick="document.location.href='{!! url() !!}/top/belanja'">Top 10 Belanja</button>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" onClick="document.location.href='{!! url() !!}/top/pendapatan'">Top 10 Pendapatan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Grafik</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> @yield('breadcrumb')
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" xclass="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Tipe Grafik
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="javascript:hideBar();">Stacked Line Chart</a>
                                        </li>
                                        <li><a href="javascript:hideArea();">Bar Chart</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @yield('content')
                        </div>
                        <!-- /.panel-body -->

                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        @yield('table')
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('asset/js/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('asset/js/bootstrap.min.js') !!}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('asset/js/metisMenu.min.js') !!}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('asset/js/raphael-min.js') !!}"></script>
    <script src="{!! asset('asset/js/morris.min.js') !!}"></script>
    <script type="text/JavaScript">
        $(function() {
            @yield('data')
        });
    </script>

    <!-- DataTables JavaScript -->
    <script src="{!! asset('asset/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('asset/js/dataTables.bootstrap.min.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('asset/js/script.js') !!}"></script>
</body>

</html>
