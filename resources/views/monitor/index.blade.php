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
	        	@if(isset($lembagas))
                <?php $i = 0; ?>
                @foreach($lembagas as $lembaga)
                @if(in_array($lembaga->nama,$labels))
                <li style="color: {{ $colors[$i] }};"><a href="{!! url() !!}/dinas/{{ $jenis }}/tipe/area/id/{{ $lembaga->id }}">{{ $lembaga->nama }}</a></li>
                @endif
                <?php $i++; ?>
                @endforeach
                @elseif(isset($id))
                @for($i = 0; $i < count($labels); $i++)
                <li style="color: {{ $colors[$i] }};">{{ $labels[$i] }}</li>
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
	        	@if(isset($lembagas))
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