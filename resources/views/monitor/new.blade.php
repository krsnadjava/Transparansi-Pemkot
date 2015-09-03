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
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-plus fa-fw"></i> Input Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    {!! Form::open([
                                      'route' => 'data.store'
                                    ]) !!}
                                        <div class="row">
                                            <div class="form-group col-lg-8">
                                                {!! Form::label('kode', 'Kode') !!}
                                                {!! Form::text('kode', null, ['class' => "form-control", 'placeholder' => 'Kode']) !!}                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-8">
                                                {!! Form::label('uraian', 'Uraian') !!}
                                                {!! Form::text('uraian', null, ['class' => "form-control", 'placeholder' => 'Uraian']) !!} 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-8">
                                                {!! Form::label('nilai', 'Nilai') !!}
                                                {!! Form::text('nilai', null, ['class' => "form-control", 'placeholder' => 'Nilai']) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-8">
                                                {!! Form::label('tahun', 'Tahun') !!}
                                                {!! Form::text('tahun', null, ['class' => "form-control", 'placeholder' => 'Tahun']) !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-8">
                                                {!! Form::label('level', 'Level') !!}
                                                <select class="form-control" name="level">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-8">
                                                {!! Form::label('lembaga_id', 'Lembaga') !!}
                                                <select class="form-control" name="lembaga_id">
                                                    @foreach($lembagas as $lembaga)
                                                    <option value="{{ $lembaga->id }}">{{ $lembaga->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <div>
                                                    {!! Form::label('tags', 'Tags') !!}
                                                </div>
                                                @foreach($tags as $tag)
                                                <div class="checkbox-inline">
                                                    <label>
                                                        <input name="tags[]" type="checkbox" value="{{ $tag->id }}"> {{ $tag->nama }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Send Data
                                        </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    </div>
                </div>
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

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('asset/js/script.js') !!}"></script>

</body>

</html>
