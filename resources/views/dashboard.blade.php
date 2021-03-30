@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">DASHBOARD</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="text-center col-md-12">
                <h3 class="text-center">QUANTIDADE DE CHAVES</h3>
            </div>
            <div class="row">
                <div class="col px-md-12">
                    <div class="info-box p-0">
                        <span class="info-box-icon bg-green" style="border-radius: 0"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <div class="text-center info-box-content bg-light">
                            <h4 class="info-box-text">Disponível</h4>
                            <h5 class="info-box-number">{{ $quantidadeChaves[0]->quantidadeChaves }}</h5>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col px-md-12">
                    <div class="info-box p-0">
                        <span class="info-box-icon bg-yellow" style="border-radius: 0"><i class="fa fa-key text-white" aria-hidden="true"></i></span>
                        <div class="text-center info-box-content bg-light">
                            <h4 class="info-box-text">Disponível</h4>
                            <h5 class="info-box-number">{{ $quantidadeChaves[1]->quantidadeChaves }}</h5>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col px-md-12">
                    <div class="info-box p-0">
                        <span class="info-box-icon bg-blue" style="border-radius: 0"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <div class="text-center info-box-content bg-light">
                            <h4 class="info-box-text">Disponível</h4>
                            <h5 class="info-box-number">{{ $quantidadeChaves[2]->quantidadeChaves }}</h5>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col px-md-12">
                    <div class="info-box p-0">
                        <span class="info-box-icon bg-red" style="border-radius: 0"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <div class="text-center info-box-content bg-light">
                            <h4 class="info-box-text">Disponível</h4>
                            <h5 class="info-box-number">{{ $quantidadeChaves[3]->quantidadeChaves }}</h5>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

            <div class="container">
                <table class="table table-bordered table-hover table-head-fixed">
                    <thead>
                    <tr>
                        <th>Sala</th>
                        <th>Código</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($chaves as $chave)
                        <tr>
                            <td>{{ $chave->sala()->first()->sala }}</td>
                            <td>{{ $chave->codigo }}</td>
                            <td>{{ $chave->status()->first()->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="3">
                            <span class="float-right">
                                {{ $chaves->links() }}
                            </span>
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Browser<br>shares<br>2017',
                align: 'center',
                verticalAlign: 'middle',
                y: 60
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                innerSize: '50%',
                data: [
                    ['Chrome', 58.9],
                    ['Firefox', 13.29],
                    ['Internet Explorer', 13],
                    ['Edge', 3.78],
                    ['Safari', 3.42],
                    {
                        name: 'Other',
                        y: 7.61,
                        dataLabels: {
                            enabled: false
                        }
                    }
                ]
            }]
        });
    </script>
@stop
