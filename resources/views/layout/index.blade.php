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
                                        <option value="{!! url() !!}/dinas">Dinas</option>
                                        <option value="{!! url() !!}/kecamatan">Kecamatan</option>
                                        <option value="{!! url() !!}/bumd">BUMD</option>
                                        <option value="{!! url() !!}/other">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tampil">Tipe Dana</label>
                                    <select class="form-control" id="tampil" onchange="if(this[this.selectedIndex].value!=='')location.href=this.value;">
                                        <option value="{!! url() !!}">Pendapatan</option>
                                        <option value="{!! url() !!}">Belanja</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Hanya tampilkan</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked> <a href="">Dinas</a>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked> <a href="">Kecamatan</a>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked> <a href="">BUMD</a>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked> <a href="">Lain-lain</a>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Tipe Dana</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="belanja[]" type="checkbox" checked> <a href="">Belanja Tidak Langsung</a>
                                        </label>
                                    </div>
                                    <div class="checkbox" style="margin-left:7px;">
                                        <label>
                                            <input name="belanja[]" type="checkbox" checked> Tunjangan Pegawai
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="belanja[]" type="checkbox" checked> <a href="">Belanja Langsung</a>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <button>Top 10 Program</button>
                                </div>
                                <div class="form-group">
                                    <button>Top 10 Tag</button>
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Belanja | Semua
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
                            <div id="area-chart" class="row">
                                <div class="col-lg-9">
                                    <div id="morris-area-chart"></div>
                                </div>
                                <div class="col-lg-3">
                                    Keterangan :
                                    <ul style="list-style-type: square; font-size: 14px;">
                                        <li style="color: #17A768;"><a href="#">Dinas</a></li>
                                        <li style="color: #F1601D";><a href="#">Kecamatan</a></li>
                                        <li style="color: #F1AD1D;"><a href="#">BUMD</a></li>
                                        <li style="color: #BBAE93;"><a href="#">Lain-lain</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="bar-chart" class="row hidden">
                                <div class="col-lg-9">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <div class="col-lg-3">
                                    Keterangan :
                                    <ul style="list-style-type: square; font-size: 14px;">
                                        <li style="color: #17A768;"><a href="#">Dinas</a></li>
                                        <li style="color: #F1601D;"><a href="#">Kecamatan</a></li>
                                        <li style="color: #F1AD1D;"><a href="#">BUMD</a></li>
                                        <li style="color: #BBAE93;"><a href="#">Lain-lain</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-table fa-fw"></i> Tabel Rincian
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><a href="#">Expand All</a></th>
                                            <th>2014</th>
                                            <th>2015</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#"><i class="fa fa-caret-down"></i> Dinas</a></td>
                                            <td>2374</td>
                                            <td>1092</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:20px;"><a href="#"><i class="fa fa-caret-down"></i> Dinas Pendidikan</a></td>
                                            <td>292</td>
                                            <td>139</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:35px;"><a href="#"><i class="fa fa-caret-right"></i> Belanja Tidak Langsung</a></td>
                                            <td>14</td>
                                            <td>16</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:35px;"><a href="#"><i class="fa fa-caret-down"></i> Belanja Langsung</a></td>
                                            <td>278</td>
                                            <td>123</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:50px;"><a href="#"><i class="fa fa-caret-right"></i> Program Pelayanan Administrasi Perkantoran</a></td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:50px;"><a href="#"><i class="fa fa-caret-right"></i> Program Peningkatan Sarana dan Prasarana Aparatur</a></td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:20px;"><a href="#"><i class="fa fa-caret-right"></i> Dinas Kesehatan</a></td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:20px;"><a href="#"><i class="fa fa-caret-right"></i> Dinas Sosial</a></td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><i class="fa fa-caret-right"></i> Kecamatan</a></td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><i class="fa fa-caret-right"></i> BUMBD</a></td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><i class="fa fa-caret-right"></i> Lain-lain</a></td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th>2014</th>
                                            <th>2015</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
            Morris.Area({
                element: 'morris-area-chart',
                data: [{
                    period: '2014-12-05',
                    a: 10687,
                    b: 4460,
                    c: 4460,
                    d: 2028
                }, {
                    period: '2015-02-20',
                    a: 8432,
                    b: 5713,
                    c: 5713,
                    d: 2359
                }],
                xkey: 'period',
                ykeys: ['a', 'b', 'c', 'd'],
                labels: ['Dinas', 'Kecamatan', 'Badan Usaha Milik Daerah', 'Lain-lain'],
                lineColors: ["#17A768", "#F1601D", "#F1AD1D", "#BBAE93"],
                pointSize: 3,
                hideHover: 'auto',
                resize: true
            });
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [{
                    period: '2014',
                    a: 10687,
                    b: 4460,
                    c: 4460,
                    d: 2028
                }, {
                    period: '2015',
                    a: 8432,
                    b: 5713,
                    c: 5713,
                    d: 2359
                }],
                xkey: 'period',
                ykeys: ['a', 'b', 'c', 'd'],
                labels: ['Dinas', 'Kecamatan', 'Badan Usaha Milik Daerah', 'Lain-lain'],
                hideHover: 'auto',
                barColors: ["#17A768", "#F1601D", "#F1AD1D", "#BBAE93"],
                stacked: true,
                resize: true
            });
        });
    </script>

    <!-- DataTables JavaScript -->
    <script src="{!! asset('asset/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('asset/js/dataTables.bootstrap.min.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('asset/js/script.js') !!}"></script>

</body>

</html>
