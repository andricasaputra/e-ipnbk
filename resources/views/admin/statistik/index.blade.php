@extends('admin.layouts.app')

@section('title', 'E-IPNBK | Statistik IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Statistik IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Statistik IPNBK.</span>
    </h3>
    <div class="d-flex">
      <a href="{{ route('admin.setting.create') }}" type="button" class="btn btn-sm ml-3 btn-success"> Tambah Survey </a>
    </div>
  </div>
@endsection

@section('content')

<div class="card">
<div class="card-body">
    <h4 class="card-title">Jadwal Srvey IPNBK</h4>
    {{-- <p class="card-description"> Add class <code>.table</code> --}}
    </p>
    <div id="container" style="width:100%; height:400px;"></div>
  </div>
</div>

@endsection

@section('script')

<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Fruit Consumption'
            },
            xAxis: {
                categories: ['Apples', 'Bananas', 'Oranges']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
                }
            },
            series: [{
                name: 'Jane',
                data: [1, 0, 4]
            }, {
                name: 'John',
                data: [5, 7, 3]
            }]
        });
    });
</script>

@endsection

