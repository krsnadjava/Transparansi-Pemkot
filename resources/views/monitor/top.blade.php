@extends('layout.index')

@section('breadcrumb', $breadcrumb)

@section('tahun')
    @foreach($datas as $data)
    <li><a href="javascript:showYear({{ $data['year'] }});">{{ $data['year'] }}</a></li>
    @endforeach
@endsection

@section('content')
    <?php $i = 0; ?>
    @foreach($datas as $data)
    @if($i < 1)
	<div id="top-{{ $data['year'] }}" class="row">
    @else
    <div id="top-{{ $data['year'] }}" class="row hidden">
    @endif
        <div class="col-lg-9">
            <div id="morris-top-{{ $data['year'] }}"></div>
        </div>
        <div class="col-lg-3">
            Keterangan :
            <ul style="list-style-type: square; font-size: 14px;">
                @for($j = 0; $j < count($data)-1; $j++)
                <li style="color: {{ $colors[$j] }};">{{ $data[$j]->uraian }}</li>
                @endfor
            </ul>
        </div>
    </div>
    <?php $i++; ?>
    @endforeach
@endsection

@section('data')
    @if(isset($datas))
    @foreach($datas as $data)
        Morris.Bar({
            element: 'morris-top-{{ $data['year'] }}',
            data: [
            @for ($i = 0; $i < count($data)-1; $i++)
            {
                x: '{{ ($i+1) }}',
                y: '{{ $data[$i]->nilai }}'
            @if($i < count($data)-2)
            },
            @else
            }
            @endif
            @endfor
            ],
            xkey: 'x',
            ykeys: 'y',
            labels: [
                @for($i = 0; $i < count($data)-1; $i++)
                '{{ $data[$i]->uraian }}'
                @if($i < count($data)-2)
                ,
                @endif
                @endfor
            ],
            hideHover: 'auto',
            barColors: [
                @for ($i = 0; $i < count($data)-1; $i++)
                "{{ $colors[$i] }}"
                @if($i < count($data)-2)
                ,
                @endif
                @endfor
            ],
            resize: true
        });
    @endforeach
    @endif
@endsection

@section('script')
    @if(isset($datas))
    function showYear(chartId) {
        @foreach($datas as $data)
        $("#top-"+{{ $data['year'] }}).addClass("hidden");
        @endforeach
        $("#top-"+chartId).removeClass("hidden");
        $(window).trigger('resize');
    }
    @endif
@endsection