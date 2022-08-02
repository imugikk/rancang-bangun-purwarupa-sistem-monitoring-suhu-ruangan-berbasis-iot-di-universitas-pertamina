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
                                Schedules List
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
                                <i class="me-1" data-feather="send"></i>
                                Import CSV
                            </a>
                            <a class="btn btn-sm btn-light text-primary" href="/add-schedules">
                                <i class="me-1" data-feather="plus"></i>
                                Add Schedules
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4">
            <div class="card">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Mata Kuliah</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Mata Kuliah</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-2"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></div>
                                        Tiger Nixon
                                    </div>
                                </td>
                                <td>tiger@email.com</td>
                                <td>Administrator</td>
                                <td>
                                    <span class="badge bg-green-soft text-green">Sales</span>
                                    <span class="badge bg-blue-soft text-blue">Developers</span>
                                    <span class="badge bg-red-soft text-red">Marketing</span>
                                    <span class="badge bg-purple-soft text-purple">Managers</span>
                                    <span class="badge bg-yellow-soft text-yellow">Customer</span>
                                </td>
                                <td>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user.html"><i data-feather="edit"></i></a>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-2"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-2.png" /></div>
                                        Garrett Winters
                                    </div>
                                </td>
                                <td>gwinterse@email.com</td>
                                <td>Administrator</td>
                                <td>
                                    <span class="badge bg-green-soft text-green">Sales</span>
                                    <span class="badge bg-blue-soft text-blue">Developers</span>
                                    <span class="badge bg-red-soft text-red">Marketing</span>
                                    <span class="badge bg-purple-soft text-purple">Managers</span>
                                    <span class="badge bg-yellow-soft text-yellow">Customer</span>
                                </td>
                                <td>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user.html"><i data-feather="edit"></i></a>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-2"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-3.png" /></div>
                                        Ashton Cox
                                    </div>
                                </td>
                                <td>ashtonc@email.com</td>
                                <td>Registered</td>
                                <td>
                                    <span class="badge bg-green-soft text-green">Sales</span>
                                    <span class="badge bg-red-soft text-red">Marketing</span>
                                </td>
                                <td>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user.html"><i data-feather="edit"></i></a>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
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
