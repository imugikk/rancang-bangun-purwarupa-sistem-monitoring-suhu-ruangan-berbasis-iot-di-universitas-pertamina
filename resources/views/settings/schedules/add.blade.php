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
                                Add Schedule
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="/schedules">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Back to Schedules List
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
                        <div class="card-header">Schedule Details</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1">Mata Kuliah</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected disabled>Select a subject:</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="registered">Registered</option>
                                            <option value="edtior">Editor</option>
                                            <option value="guest">Guest</option>
                                        </select>
                                    </div>
                                    <!-- Form Group (last name)-->
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1">Office</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected disabled>Select an office:</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="registered">Registered</option>
                                            <option value="edtior">Editor</option>
                                            <option value="guest">Guest</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">Room</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected disabled>Select a room:</option>
                                            <option value="administrator">Administrator</option>
                                            <option value="registered">Registered</option>
                                            <option value="edtior">Editor</option>
                                            <option value="guest">Guest</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Form Group (Roles)-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName">Tanggal</label>
                                        <input class="form-control" id="inputLastName" type="date" placeholder="Enter your last name" value="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName">Start At</label>
                                        <input class="form-control" id="inputLastName" type="time" placeholder="Enter your last name" value="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName">End At</label>
                                        <input class="form-control" id="inputLastName" type="time" placeholder="Enter your last name" value="" />
                                    </div>
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="button">Add user</button>
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
