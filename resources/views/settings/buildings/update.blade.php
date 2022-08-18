@extends('layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                <div class="container-xl px-4">
                    <div class="page-header-content">
                        <div class="row align-items-center justify-content-between pt-3">
                            <div class="col-auto mb-3">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="calendar"></i></div>
                                    Add Building
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mb-3">
                                <a class="btn btn-sm btn-light text-primary" href="/buildings">
                                    <i class="me-1" data-feather="arrow-left"></i>
                                    Back to Buildings List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-4">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Buildings Details</div>
                            <div class="card-body">
                                <form method="post" action="{{ route('buildings.update', $building->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Gedung</label>
                                            <input class="form-control" id="name" type="text" placeholder="Enter your office" name="name" value="{{ $building->name }}"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="small mb-1">Lantai</label>
                                            <input class="form-control" id="floor" type="text" placeholder="Enter your office" name="floor" value="{{ $building->floor }}"/>
                                        </div>
                                    </div>
                                    <!-- Submit button-->
                                    <button class="btn btn-primary" type="submit">Update building</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
