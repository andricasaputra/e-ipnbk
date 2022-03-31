@extends('admin.layouts.app')

@section('title', 'E-IPNBK | Statistik IPNBK')

@section('barside.title', 'IPNBK Sumbawa')

@section('header')
  <div class="page-header flex-wrap">
    <h3 class="mb-0"> Statistik IPNBK <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Statistik IPNBK.</span>
    </h3>
    <div class="d-flex">
    </div>
  </div>
@endsection

@section('link')
<style>
#container {
  height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

</style>
@endsection

@section('content')

<div class="card">
<div class="card-body">
    <h4 class="card-title">Grafik Survey IPNBK</h4>
    {{-- <p class="card-description"> Add class <code>.table</code> --}}
    </p>
    <figure class="highcharts-figure">
    <div id="container"></div>

    {{-- <p class="highcharts-description">
        Chart showing use of rotated axis labels and data labels. This can be a
        way to include more labels in the chart, but note that more labels can
        sometimes make charts harder to read.
    </p> --}}
</figure>
  </div>
</div>

@endsection

@section('script')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
	Highcharts.chart('container', {
        colors: ['#24CBE5'],
        chart: {
            type: 'column'
        },
        title: {
            text: 'Nilai IPNBK Per Unsur Pertanyaan'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nilai IPNBK'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Nilai IPNBK: <b>{point.y:.1f} point</b>'
        },
        series: [{
            name: 'Pertanyaan',
            data: {!! $respondens !!}
            ,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
    </script>

@endsection

