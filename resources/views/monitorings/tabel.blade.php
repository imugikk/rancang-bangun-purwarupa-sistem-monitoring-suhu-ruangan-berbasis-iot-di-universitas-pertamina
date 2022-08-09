@extends('layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                <div class="container-fluid px-4">
                    <div class="page-header-content">
                        <div class="row align-items-center justify-content-between pt-3">
                            <div class="col-auto mb-3">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="user"></i></div>
                                    Ruangan {{$room->number}}
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mb-3">
                                <a class="btn btn-sm btn-light text-primary" href="/monitoring">
                                    <i class="me-1" data-feather="arrow-left"></i>
                                    Back to Monitoring
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="row px-4">
                <div class="col-xl-12 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Earnings Breakdown
                            <div class="dropdown no-caret">
                                <button class="btn btn-transparent-dark btn-icon dropdown-toggle"
                                    id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="text-gray-500"
                                        data-feather="more-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end animated--fade-in-up"
                                    aria-labelledby="areaChartDropdownExample">
                                    <a class="dropdown-item" href="#!">Last 12 Months</a>
                                    <a class="dropdown-item" href="#!">Last 30 Days</a>
                                    <a class="dropdown-item" href="#!">Last 7 Days</a>
                                    <a class="dropdown-item" href="#!">This Month</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Custom Range</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main page content-->
            <div class="container-fluid px-4">
                <div class="card">
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Suhu</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Suhu</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($temperatures as $temperature)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{$temperature['tanggal']}}
                                            </div>
                                        </td>
                                        <td>{{$temperature['waktu']}}</td>
                                        <td>
                                            {{$temperature['suhu']}} &deg;C
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
