@extends('template.index')

@section('navigation')
<div class="panel-heading">Filters</div>
<div class="panel-body">
    <form name="filter" id="filter" method="post" action="{{ route('exclude') }}">
        <div class="form-group">
        	<p>Tampilkan</p>
            <select class="form-control" id="tampil" onchange="if(this[this.selectedIndex].value!=='')location.href=this.value;">
                <option value="{!! url() !!}">Semua</option>
                <option value="{!! url() !!}/dinas/{{ $jenis }}/tipe/area/id">Dinas</option>
                <option value="{!! url() !!}/kecamatan/{{ $jenis }}/tipe/area/id">Kecamatan</option>
                <option value="{!! url() !!}/bumd/{{ $jenis }}/tipe/area/id">BUMD</option>
                <option value="{!! url() !!}/other/{{ $jenis }}/tipe/area/id">Lain-lain</option>
            </select>
        </div>
        <div class="form-group">
        	<p>Tipe Dana</p>
            <select class="form-control" id="tampil" onchange="if(this[this.selectedIndex].value!=='')location.href=this.value;">
                <option value="{!! url() !!}">Tipe Dana</option>
                <option value="{!! url() !!}/transparansi/pendapatan">Pendapatan</option>
                <option value="{!! url() !!}/transparansi/belanja">Belanja</option>
            </select>
        </div>
        <hr>
        <div class="form-group">
        	<input type="hidden" name="_METHOD" value="POST">
        	<input type="hidden" name="dana" value="{{ $jenis }}">
        	<p>Hanya Tampilkan</p>
        	@foreach($tables as $data)
            	@if($data['level'] > 0)
            	<div class="header checkbox" data-level="{{ $data['level'] }}" style="display:none;">
            	@else
            	<div class="header checkbox" data-level="{{ $data['level'] }}">
            	@endif
                    @if($data['level'] > 0)
                    <i class="fa fa-caret-right" style="padding-left:{{ 5+($data['level']*5) }}px;"></i>
                    <label>
                    	<?php $ids = ""; ?>
                    	@for($i = 0; $i < count($years); $i++)
                    	<?php $ids .= $data['id'][$i]; ?>
                    	@if($i < count($years)-1)
                    	<?php $ids .= ","; ?>
                    	@endif
                    	@endfor
                	    <input class="checkbox" name="exclude[]" type="checkbox" value="{{ $ids }}" checked> <a>{{ $data['nama'] }}</a>
                	</label>
                    @else
                    <i class="fa fa-caret-right"></i>
                    <label>
                    	@if($data['id'][0] < 0)
                	    <input class="checkbox" name="exclude[]" type="checkbox" value="{{ $data['nama'] }}" checked> <a>{{ $data['nama'] }}</a>
                	    @else
                	    <input class="checkbox" name="exclude[]" type="checkbox" value="{{ $data['id'][0] }}" checked> <a>{{ $data['nama'] }}</a>
                	    @endif
                	</label>
                    @endif
            	</div>
            @endforeach
        </div>
        <hr>
        <p>Annual Top 10</p>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-block" onClick="document.location.href='{!! url() !!}/top/belanja'">Top 10 Belanja</button>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-block" onClick="document.location.href='{!! url() !!}/top/pendapatan'">Top 10 Pendapatan</button>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-block" onClick="document.location.href='{!! url() !!}/top/belanja'">Top 10 Tags</button>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-block" onClick="document.location.href='{!! url() !!}/top/pendapatan'">Top 10 Rasio</button>
        </div>
    </form>
</div>
@endsection

@section('breadcrumbs', $breadcrumbs)

@section('chartmenus')
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
@endsection

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
	    	<?php $i = 0; ?>
	    	@foreach($tooltips as $tooltip)
	    	@if($tooltip['id'] > 0)
	    	<li style="color: {{ $helper['colors'][$i] }};"><a href="{!! url() !!}/{{ $tooltip['url'] }}/{{ $jenis }}/tipe/area/id/{{ $tooltip['id'] }}">{{ $tooltip['nama'] }}</a></li>
	    	@else
	    	<li style="color: {{ $helper['colors'][$i] }};"><a href="{!! url() !!}/{{ $tooltip['url'] }}/{{ $jenis }}/tipe/area/id">{{ $tooltip['nama'] }}</a></li>
	    	@endif
            <?php $i++; ?>
	    	@endforeach
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
	    	<?php $i = 0; ?>
	    	@foreach($tooltips as $tooltip)
	    	@if($tooltip['id'] > 0)
	    	<li style="color: {{ $helper['colors'][$i] }};"><a href="{!! url() !!}/{{ $tooltip['url'] }}/{{ $jenis }}/tipe/bar/id/{{ $tooltip['id'] }}">{{ $tooltip['nama'] }}</a></li>
	    	@else
	    	<li style="color: {{ $helper['colors'][$i] }};"><a href="{!! url() !!}/{{ $tooltip['url'] }}/{{ $jenis }}/tipe/bar/id">{{ $tooltip['nama'] }}</a></li>
	    	@endif
            <?php $i++; ?>
	    	@endforeach
	    </ul>
	</div>
</div>
@endsection

@section('table')
<div class="panel-heading">
    <i class="fa fa-table fa-fw"></i> {{ ucwords($jenis) }} | Tabel Rincian
</div>
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
            @foreach($tables as $data)
            	@if($data['level'] > 0)
            	<tr class="header" data-level="{{ $data['level'] }}" style="display:none;">
            	@else
            	<tr class="header" data-level="{{ $data['level'] }}">
            	@endif
                    @if($data['level'] > 0)
                    <td><i class="fa fa-caret-right" style="padding-left:{{ 5+($data['level']*15) }}px;"></i> {{ $data['nama'] }}</td>
                    @else
                    <td><i class="fa fa-caret-right"></i> {{ $data['nama'] }}</td>
                    @endif
                    @for($i = 0; $i < count($years); $i++)
                    <td class="data" style="text-align:right;"><span>{{ $data[$i] }}</span></td>
                    @endfor
            	</tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    @for($i = 0; $i < count($years); $i++)
                    	<?php $total = 0; ?>
                    	@foreach($tables as $data)
                    		@if($data['level'] < 1)
                    		<?php $total += $data[$i]; ?>
                    		@endif
                    	@endforeach
                    	<th style="text-align:right;">{{ $total }}</th>
                    @endfor
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('data')
Morris.Area({
    element: 'morris-area-chart',
    data: [
    @for ($i = 0; $i < count($years); $i++)
    {
        period: '{{ $years[$i] }}',
        <?php $j = 0; ?>
        @foreach($graphs as $data)
        {{ $helper['alphas'][$j] }}: {{ $data[$i] }}
        @if($j < count($graphs)-1)
        ,
        @endif
        <?php $j++; ?>
        @endforeach
    @if($i < count($years)-1)
    },
    @else
    }
    @endif
    @endfor
    ],
    xkey: 'period',
    ykeys: [
        @for ($i = 0; $i < count($graphs); $i++)
        '{{ $helper['alphas'][$i] }}'
        @if($i < count($graphs)-1)
        ,
        @endif
        @endfor
    ],
    xLabels: "year",
    labels: [
        @for ($i = 0; $i < count($graphs); $i++)
        '{{ $graphs[$i]['nama'] }}'
        @if($i < count($graphs)-1)
        ,
        @endif
        @endfor
    ],
    lineColors: [
        @for ($i = 0; $i < count($graphs); $i++)
        "{{ $helper['colors'][$i] }}"
        @if($i < count($graphs)-1)
        ,
        @endif
        @endfor
    ],
    pointSize: 3,
    hideHover: 'auto',
    hoverCallback: function (index, options, content, row) {
      var total = 0;
      @for ($i = 0; $i < count($graphs); $i++)
        total += row.{{ $helper['alphas'][$i] }};
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
    @for ($i = 0; $i < count($years); $i++)
    {
        period: '{{ $years[$i] }}',
        <?php $j = 0; ?>
        @foreach($graphs as $data)
        {{ $helper['alphas'][$j] }}: {{ $data[$i] }}
        @if($j < count($graphs)-1)
        ,
        @endif
        <?php $j++; ?>
        @endforeach
    @if($i < count($years)-1)
    },
    @else
    }
    @endif
    @endfor
    ],
    xkey: 'period',
    ykeys: [
        @for ($i = 0; $i < count($graphs); $i++)
        '{{ $helper['alphas'][$i] }}'
        @if($i < count($graphs)-1)
        ,
        @endif
        @endfor
    ],
    xLabels: "year",
    labels: [
        @for ($i = 0; $i < count($graphs); $i++)
        '{{ $graphs[$i]['nama'] }}'
        @if($i < count($graphs)-1)
        ,
        @endif
        @endfor
    ],
    hideHover: 'auto',
    hoverCallback: function (index, options, content, row) {
      var total = 0;
      @for ($i = 0; $i < count($graphs); $i++)
        total += row.{{ $helper['alphas'][$i] }};
      @endfor
      return content+"<div class='morris-hover-row-label'>Total : "
        + total
        +"</div>";
    },
    barColors: [
        @for ($i = 0; $i < count($graphs); $i++)
        "{{ $helper['colors'][$i] }}"
        @if($i < count($graphs)-1)
        ,
        @endif
        @endfor
    ],
    stacked: true,
    resize: true
});

$('input.checkbox').on('change', fun);
$('input.checkbox').change(function(e){
	var checkStatus = $(this).prop('checked');
	var container = $(this).parent().parent();
	var children = getChildren(container);
	$.each(children, function() {
		if(checkStatus == false) {
			$(this).find('label').find('input[type="checkbox"].checkbox').prop({
				checked: false
			});
		} else {
			$(this).find('label').find('input[type="checkbox"].checkbox').prop({
				checked: true
			});
		}
    });
});

function getChildren($row) {
    var children = [], level = $row.attr('data-level');
    while($row.next().attr('data-level') > level) {
        children.push($row.next());
        $row = $row.next();
    }            
    return children;
}
@endsection

@section('script')
@if(isset($error))
alert("{{$error}}");
@endif

secs = 2; // Wait for 2 seconds, then submit form
timer = null;
fun = function() {
	secs = 2;
	clearInterval(timer);
	timer = setInterval(function () {
    if(secs < 1){
        clearInterval(timer);
        document.getElementById('filter').submit();
    }
    secs--;
	}, 1000)	
}

@endsection