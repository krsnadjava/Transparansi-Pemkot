@extends('layout.monitor')

@section('breadcrumb', $breadcrumb)

@section('content')
	@if(isset($type) && $type === "bar")
	<div id="area-chart" class="row hidden">
	@else
	<div id="area-chart" class="row">
	@endif
	    <div class="col-lg-9">
	        <div id="morris-area-chart"></div>
	    </div>
	    <div class="col-lg-3">
	        Keterangan :
	        <ul style="list-style-type: square; font-size: 14px;">
	        	@if(isset($lembagas) && !(isset($id)))
                <?php $i = 0; ?>
                @foreach($lembagas as $lembaga)
                @if(in_array($lembaga->nama,$labels))
                <li style="color: {{ $colors[$i] }};"><a href="{!! url() !!}/dinas/{{ $jenis }}/tipe/area/id/{{ $lembaga->id }}">{{ $lembaga->nama }}</a></li>
                @endif
                <?php $i++; ?>
                @endforeach
                @elseif(isset($id))
                @for($j = 0; $j < count($labels); $j++)
                <li style="color: {{ $colors[$j] }};">{{ $labels[$j] }}</li>
                @endfor
	        	@else
                <li style="color: #17A768;"><a href="{!! url() !!}/pemkot/dinas/{{ $jenis }}/tipe/area/id/">Dinas</a></li>
                <li style="color: #F1601D";><a href="{!! url() !!}/pemkot/kecamatan/{{ $jenis }}/tipe/area/id/">Kecamatan</a></li>
                <li style="color: #F1AD1D;"><a href="{!! url() !!}/pemkot/bumd/{{ $jenis }}/tipe/area/id/">BUMD</a></li>
                <li style="color: #BBAE93;"><a href="{!! url() !!}/pemkot/other/{{ $jenis }}/tipe/area/id/">Lain-lain</a></li>
	            @endif
	        </ul>
	    </div>
	</div>
	@if(isset($type) && $type === "bar")
	<div id="bar-chart" class="row">
	@else
	<div id="bar-chart" class="row hidden">
	@endif
	    <div class="col-lg-9">
	        <div id="morris-bar-chart"></div>
	    </div>
	    <div class="col-lg-3">
	        Keterangan :
	        <ul style="list-style-type: square; font-size: 14px;">
	        	@if(isset($lembagas) && !(isset($id)))
                <?php $i = 0; ?>
                @foreach($lembagas as $lembaga)
                @if(in_array($lembaga->nama,$labels))
                <li style="color: {{ $colors[$i] }};"><a href="{!! url() !!}/dinas/belanja/tipe/area/id/{{ $lembaga->id }}">{{ $lembaga->nama }}</a></li>
                @endif
                <?php $i++; ?>
                @endforeach
                @elseif(isset($id))
                @for($i = 0; $i < count($labels); $i++)
                <li style="color: {{ $colors[$i] }};">{{ $labels[$i] }}</li>
                @endfor
	        	@else
                <li style="color: #17A768;"><a href="{!! url() !!}/dinas/{{ $jenis }}/tipe/area/id/">Dinas</a></li>
                <li style="color: #F1601D";><a href="{!! url() !!}/kecamatan/{{ $jenis }}/tipe/area/id/">Kecamatan</a></li>
                <li style="color: #F1AD1D;"><a href="{!! url() !!}/bumd/{{ $jenis }}/tipe/area/id/">BUMD</a></li>
                <li style="color: #BBAE93;"><a href="{!! url() !!}/other/{{ $jenis }}/tipe/area/id/">Lain-lain</a></li>
	            @endif
	        </ul>
	    </div>
	</div>
@endsection

@section('data')
	@if(isset($datas))
	Morris.Area({
        element: 'morris-area-chart',
        data: [
        @for ($i = 0; $i < count($datas); $i++)
        {
            period: '{{ $datas[$i]['year'] }}',
            @for ($j = 0; $j < count($labels); $j++)
            {{ $alphas[$j] }}: {{ $datas[$i][$j] }}
            @if($j < count($labels)-1)
            ,
            @endif
            @endfor
        @if($i < count($datas)-1)
        },
        @else
        }
        @endif
        @endfor
        ],
        xkey: 'period',
        ykeys: [
            @for ($i = 0; $i < count($labels); $i++)
            '{{ $alphas[$i] }}'
            @if($i < count($labels)-1)
            ,
            @endif
            @endfor
        ],
        xLabels: "year",
        labels: [
            @for ($i = 0; $i < count($labels); $i++)
            '{{ $labels[$i] }}'
            @if($i < count($labels)-1)
            ,
            @endif
            @endfor
        ],
        lineColors: [
            @for ($i = 0; $i < count($labels); $i++)
            "{{ $colors[$i] }}"
            @if($i < count($labels)-1)
            ,
            @endif
            @endfor
        ],
        pointSize: 3,
        hideHover: 'auto',
        hoverCallback: function (index, options, content, row) {
          var total = 0;
          @for ($i = 0; $i < count($labels); $i++)
            total += row.{{ $alphas[$i] }};
          @endfor
          return content+"<div class='morris-hover-row-label'>Total : "
            + total
            +"</div>";
        },
        resize: true
    });
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
        @for ($i = 0; $i < count($datas); $i++)
        {
            period: '{{ $datas[$i]['year'] }}',
            @for ($j = 0; $j < count($labels); $j++)
            {{ $alphas[$j] }}: {{ $datas[$i][$j] }}
            @if($j < count($labels)-1)
            ,
            @endif
            @endfor
        @if($i < count($datas)-1)
        },
        @else
        }
        @endif
        @endfor
        ],
        xkey: 'period',
        ykeys: [
            @for ($i = 0; $i < count($labels); $i++)
            '{{ $alphas[$i] }}'
            @if($i < count($labels)-1)
            ,
            @endif
            @endfor
        ],
        xLabels: "year",
        labels: [
            @for ($i = 0; $i < count($labels); $i++)
            '{{ $labels[$i] }}'
            @if($i < count($labels)-1)
            ,
            @endif
            @endfor
        ],
        hideHover: 'auto',
        hoverCallback: function (index, options, content, row) {
          var total = 0;
          @for ($i = 0; $i < count($labels); $i++)
            total += row.{{ $alphas[$i] }};
          @endfor
          return content+"<div class='morris-hover-row-label'>Total : "
            + total
            +"</div>";
        },
        barColors: [
            @for ($i = 0; $i < count($labels); $i++)
            "{{ $colors[$i] }}"
            @if($i < count($labels)-1)
            ,
            @endif
            @endfor
        ],
        stacked: true,
        resize: true
    });
    @endif
@endsection

@section('table')
    <div class="panel-heading">
        <i class="fa fa-table fa-fw"></i> {{ ucwords($jenis) }} | Tabel Rincian
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        @if(isset($years))
                        @for($i = 0; $i < count($years); $i++)
                        <th style="text-align:center;">{{ $years[$i] }}</th>
                        @endfor
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if(isset($tables))
                    @for($i = 0; $i < count($tables); $i++)
                    @if($tables[$i]['level'] > 0)
                    <tr class="header" data-level="{{ $tables[$i]['level'] }}" style="display:none;">
                    @else
                    <tr class="header" data-level="{{ $tables[$i]['level'] }}">
                    @endif
                        @if($tables[$i]['level'] > 0)
                        <td><i class="fa fa-caret-right" style="padding-left:{{ 5+($tables[$i]['level']*15) }}px;"></i> {{ $tables[$i]['nama'] }}</td>
                        @else
                        <td><i class="fa fa-caret-right"></i> {{ $tables[$i]['nama'] }}</td>
                        @endif
                        @for($j = 0; $j < count($years); $j++)
                        <td style="text-align:right;">{{ $tables[$i][$j] }}</td>
                        @endfor
                    </tr>
                    @endfor
                    @else
                    <tr class="header" data-level="0">
                        <td><i class="fa fa-caret-down"></i> Dinas</td>
                        <td>2374</td>
                        <td>1092</td>
                    </tr>
                    <tr class="header" data-level="1">
                        <td style="padding-left:20px;"><i class="fa fa-caret-down"></i> Dinas Pendidikan</td>
                        <td>292</td>
                        <td>139</td>
                    </tr>
                    <tr data-level="2">
                        <td style="padding-left:35px;"><i class="fa fa-caret-right"></i> Belanja Langsung</td>
                        <td>292</td>
                        <td>139</td>
                    </tr>
                    <tr data-level="2">
                        <td style="padding-left:35px;"><i class="fa fa-caret-right"></i> Belanja Tidak Langsung</td>
                        <td>292</td>
                        <td>139</td>
                    </tr>
                    <tr class="header" data-level="1">
                        <td style="padding-left:20px;"><i class="fa fa-caret-down"></i> Dinas Kesehatan</td>
                        <td>1452</td>
                        <td>510</td>
                    </tr>
                    <tr data-level="2">
                        <td style="padding-left:35px;"><i class="fa fa-caret-right"></i> Belanja Langsung</td>
                        <td>292</td>
                        <td>139</td>
                    </tr>
                    <tr data-level="2">
                        <td style="padding-left:35px;"><i class="fa fa-caret-right"></i> Belanja Tidak Langsung</td>
                        <td>292</td>
                        <td>139</td>
                    </tr>
                    <tr class="header" data-level="1">
                        <td style="padding-left:20px;"><i class="fa fa-caret-down"></i> Dinas Sosial</td>
                        <td>630</td>
                        <td>443</td>
                    </tr>
                    <tr data-level="2">
                        <td style="padding-left:35px;"><i class="fa fa-caret-right"></i> Belanja Langsung</td>
                        <td>292</td>
                        <td>139</td>
                    </tr>
                    <tr data-level="2">
                        <td style="padding-left:35px;"><i class="fa fa-caret-right"></i> Belanja Tidak Langsung</td>
                        <td>292</td>
                        <td>139</td>
                    </tr>
                    <tr class="header" data-level="0">
                        <td><i class="fa fa-caret-right"></i> Kecamatan</td>
                        <td>7287</td>
                        <td>7912</td>
                    </tr>
                    <tr class="header" data-level="0">
                        <td><i class="fa fa-caret-right"></i> BUMBD</td>
                        <td>8298</td>
                        <td>8342</td>
                    </tr>
                    <tr class="header" data-level="0">
                        <td><i class="fa fa-caret-right"></i> Lain-lain</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        @if(isset($years) && isset($total))
                        @for($i = 0; $i < count($years); $i++)
                        <th style="text-align:right;">{{ $total[$i] }}</th>
                        @endfor
                        @else
                        <th>2014</th>
                        <th>2015</th>
                        @endif
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
@endsection