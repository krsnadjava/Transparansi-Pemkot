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
                @foreach($lembagas as $lembaga)
                <li style="color: #17A768;"><a href="{!! url() !!}">{{ ucwords($lembaga->nama) }}</a></li>
                @endforeach
	        	@else
	            <li style="color: #17A768;"><a href="{!! url() !!}/pemkot/dinas/belanja/tipe/area/id/">Dinas</a></li>
	            <li style="color: #F1601D";><a href="{!! url() !!}/pemkot/kecamatan/belanja/tipe/area/id/">Kecamatan</a></li>
	            <li style="color: #F1AD1D;"><a href="{!! url() !!}/pemkot/bumd/belanja/tipe/area/id/">BUMD</a></li>
	            <li style="color: #BBAE93;"><a href="{!! url() !!}/pemkot/other/belanja/tipe/area/id/">Lain-lain</a></li>
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
                @foreach($lembagas as $lembaga)
                <li style="color: #17A768;"><a href="{!! url() !!}">{{ $lembaga->nama }}</a></li>
                @endforeach
	        	@else
                <li style="color: #17A768;"><a href="{!! url() !!}/pemkot/dinas/belanja/tipe/bar/id/">Dinas</a></li>
                <li style="color: #F1601D";><a href="{!! url() !!}/pemkot/kecamatan/belanja/tipe/bar/id/">Kecamatan</a></li>
                <li style="color: #F1AD1D;"><a href="{!! url() !!}/pemkot/bumd/belanja/tipe/bar/id/">BUMD</a></li>
                <li style="color: #BBAE93;"><a href="{!! url() !!}/pemkot/other/belanja/tipe/bar/id/">Lain-lain</a></li>
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
            a: {{ $datas[$i]['dinas'] }},
            b: {{ $datas[$i]['kecamatan'] }},
            c: {{ $datas[$i]['bumd'] }},
            d: {{ $datas[$i]['other'] }}
        @if($i < count($datas)-1)
        },
        @else
        }
        @endif
        @endfor
        ],
        xkey: 'period',
        ykeys: ['a', 'b', 'c', 'd'],
        xLabels: "year",
        labels: ['Dinas', 'Kecamatan', 'BUMD', 'Other'],
        lineColors: ["#17A768", "#F1601D", "#F1AD1D", "#BBAE93"],
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
            a: {{ $datas[$i]['dinas'] }},
            b: {{ $datas[$i]['kecamatan'] }},
            c: {{ $datas[$i]['bumd'] }},
            d: {{ $datas[$i]['other'] }}
        @if($i < count($datas)-1)
        },
        @else
        }
        @endif
        @endfor
        ],
        xkey: 'period',
        ykeys: ['a', 'b', 'c', 'd'],
        xLabels: "year",
        labels: ['Dinas', 'Kecamatan', 'BUMD', 'Other'],
        hideHover: 'auto',
        barColors: ["#17A768", "#F1601D", "#F1AD1D", "#BBAE93"],
        stacked: true,
        resize: true
    });
	@else
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
    @endif
@endsection