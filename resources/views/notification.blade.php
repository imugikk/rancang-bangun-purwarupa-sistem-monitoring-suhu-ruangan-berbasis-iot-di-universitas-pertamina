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
                                    <div class="page-header-icon"><i data-feather="bell"></i></div>
                                    Notifications
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mb-3">
                                <a class="btn btn-sm btn-light text-primary" href="/dashboard">
                                    <i class="me-1" data-feather="arrow-left"></i>
                                    Back to Dashboard
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
                                    <th>Notification</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Notification</th>
                                    <th>Time</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $notification->description }}</td>
                                        <td>{{ $notification->created_at }}</td>
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
                    <div class="col-md-6 small">Copyright &copy; TA - Paraptughessa Premaswari 2021</div>
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

@push('extra_js')
    <script>
        $('#datatablesSimple').on('change', '.check_status', function() {
            this.form.submit();
        });
    </script>
@endpush
