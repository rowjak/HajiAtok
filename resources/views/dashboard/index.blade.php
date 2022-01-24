@extends('layouts.template')
@section('meta')
    @php
        $title = 'Dashboard Halaman Saji Arsip Terpadu Kepaniteraan - HAJI ATOK';
        $deskripsi = 'Dashboard Halaman Saji Arsip Terpadu Kepaniteraan - HAJI ATOK';
        $keywords = '';

    @endphp
    @include('meta::manager', [
        'title'         => $title,
        'description'   => $deskripsi,
        'image'         => asset('aqua/images/logo.png'),
        'keywords'  => $keywords,
        'author' => 'Akim Vaurozi, S.Kom',
        'referrer' => 'origin',
        'type' => 'website',
        'url' => url()->current(),
        'site_name' => $title,
        'site'=> url()->current(),
        'locale' => 'id'
    ])
@endsection
@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center
                        justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard Halaman Saji Arsip Terpadu Kepaniteraan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('') }};">Dashboard</a></li>
                                <li class="breadcrumb-item active">HAJI ATOK</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-md-4">
                    <!-- card -->
                    <div class="card card-h-100 bg-primary">
                        <div class="card-header bg-primary p-2 text-center">
                            <h4 class="text-white">ARSIP</h4>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <h1 class="text-white">{{ $jumlah['arsip'] }}</h1>
                                    <h6 class="text-warning">Dokumen Arsip</h6>
                                </div>
                                <div class="col-6 text-center">
                                    <i class="mdi mdi-archive-arrow-up text-warning" style="font-size: 64px"></i>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-4">
                    <!-- card -->
                    <div class="card card-h-100 bg-success">
                        <div class="card-header bg-success p-2 text-center">
                            <h4 class="text-white">TIPE ARSIP</h4>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <h1 class="text-white">{{ $jumlah['tipe_arsip'] }}</h1>
                                    <h6 class="text-warning">Tipe Arsip</h6>
                                </div>
                                <div class="col-6 text-center">
                                    <i class="mdi mdi-archive text-warning" style="font-size: 64px"></i>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-4">
                    <!-- card -->
                    <div class="card card-h-100 bg-info">
                        <div class="card-header bg-info p-2 text-center">
                            <h4 class="text-white">USER</h4>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <div class="row align-items-center">
                                <div class="col-6 text-center">
                                    <h1 class="text-white">{{ $jumlah['pegawai'] }}</h1>
                                    <h6 class="text-warning">Jumlah Pegawai</h6>
                                </div>
                                <div class="col-6 text-center">
                                    <i class="mdi mdi-account-box-multiple text-warning" style="font-size: 64px"></i>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Grafik Arsip By Tipe Arsip</h4>
                        </div>
                        <div class="card-body">
                            <div id="column_chart" class="apex-charts"></div>
                        </div>
                    </div><!--end card-->
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection
@push('script')

   <script>

        getChart();

        function getChart(){
            axios.get(route('dashboard.chart'))
            .then(function (response) {
                var data = response.data;

                var options = {
                    chart: {
                        height: 400,
                        type: 'bar',
                        toolbar: {
                            show: false,
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '45%',
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    series: data,
                    xaxis: {
                        categories: ['Tipe Arsip'],
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah',
                            style: {
                                fontWeight:  '500',
                            },
                        }
                    },
                    grid: {
                        borderColor: '#f1f1f1',
                    },
                    fill: {
                        opacity: 1

                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + " Arsip"
                            }
                        }
                    }
                }

                var chart = new ApexCharts(
                    document.querySelector("#column_chart"),
                    options
                );

                chart.render();
            })
            .catch(function (error) {
                notify('danger','Error!',error, 'right');
            });

        }


   </script>
@endpush
