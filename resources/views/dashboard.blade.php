@extends('layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between"></div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="row">
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body h-100 p-5">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 col-xxl-12">
                                        <div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                            <h1 class="text-primary">Welcome to Smart Temperature
                                                Universitas Pertamina!</h1>
                                            <p class="text-gray-700 mb-0">Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Qui dolor et alias doloribus labore dolorum dolore
                                                voluptates aut. Porro odit sint aliquid et perferendis
                                                exercitationem ducimus culpa vero qui at.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                                            src="assets/img/illustrations/at-work.svg" style="max-width: 26rem" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Example Colored Cards for Dashboard Demo-->
                    <div class="row">
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Total Ruangan</div>
                                            <div class="text-lg fw-bold">{{$room['all']}}</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="thermometer"></i>
                                    </div>
                                </div>
                                {{-- <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="/dashboard/safe">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Kondisi Ruangan Baik</div>
                                            <div class="text-lg fw-bold">{{$room['safe']}}</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="cloud"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="/dashboard/safe">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-warning text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Pemeriksaan Ruangan</div>
                                            <div class="text-lg fw-bold">{{$room['warning']}}</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="check-square"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="/dashboard/warning">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-danger text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Pemeriksaan AC</div>
                                            <div class="text-lg fw-bold">{{$room['danger']}}</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="airplay"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="/dashboard/danger">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Example DataTable for Dashboard Demo-->
                </div>
        </main>
        <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; TA - Paraptughessa Premaswari 2022</div>
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
