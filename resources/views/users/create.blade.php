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
                                    Add User
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mb-3">
                                <a class="btn btn-sm btn-light text-primary" href="/users">
                                    <i class="me-1" data-feather="arrow-left"></i>
                                    Back to User List
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
            </header>
            <div class="container-xl px-4 mt-4">
                <div class="card mb-4">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.store') }}">
                            @csrf
                            <div class="mb-3"><label for="username">Username</label><input class="form-control"
                                    id="username" name="username" type="text"></div>
                            <div class="mb-3"><label for="name">Name</label><input class="form-control" id="name"
                                    name="name" type="text"></div>
                            <div class="mb-3"><label for="email">Email</label><input class="form-control"
                                    id="email" name="email" type="email"></div>
                            <div class="mb-3"><label for="password">Password</label><input class="form-control"
                                    id="password" name="password" type="password"></div>
                            <button type="submit">Save</button>
                        </form>
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
