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
                                    Total Ruangan
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
                                    <th>Ruangan</th>
                                    <th>Gedung</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Ruangan</th>
                                    <th>Gedung</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{ $room->number }}
                                            </div>
                                        </td>
                                        <td>{{ $room->building->name . ' Lt.' . $room->building->floor }}</td>
                                        <td>
                                            @if ($status == 'safe')
                                                <span class="badge bg-green-soft text-green">{{ $room_status }}</span>
                                            @endif
                                            @if ($status == 'warning')
                                                <span class="badge bg-yellow-soft text-yellow">{{ $room_status }}</span>
                                            @endif
                                            @if ($status == 'danger')
                                                <span class="badge bg-red-soft text-red">{{ $room_status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="/update-room" method="post">
                                                @csrf
                                                <div class="col">
                                                    <select class="form-select" name="check_status">
                                                        <option value="Tidak Diperiksa"
                                                            {{ $room->check_status == 'Tidak Diperiksa' ? 'selected' : '' }}>
                                                            Tidak Diperiksa</option>
                                                        <option value="Sedang Diperiksa"
                                                            {{ $room->check_status == 'Sedang Diperiksa' ? 'selected' : '' }}>
                                                            Sedang Diperiksa</option>
                                                        <option value="Sudah Diperiksa"
                                                            {{ $room->check_status == 'Sudah Diperiksa' ? 'selected' : '' }}>
                                                            Sudah Diperiksa</option>
                                                    </select>
                                                </div>
                                            </form>
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
