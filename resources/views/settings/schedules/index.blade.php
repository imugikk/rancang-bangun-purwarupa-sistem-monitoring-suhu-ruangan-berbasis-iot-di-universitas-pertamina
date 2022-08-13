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
                                <button type="button" class="btn btn-sm btn-light text-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">
                                    <i class="me-1" data-feather="send"></i>
                                    Import CSV
                                </button>
                                <a class="btn btn-sm btn-light text-primary" href="/schedules/create">
                                    <i class="me-1" data-feather="plus"></i>
                                    Add Schedules
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form method="post" action="{{ route('import-schedule') }}" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Import CSV</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="schedule">Import Schedule</label>
                                    <input type="file" class="form-control-file" id="schedule-file" name="schedule-file"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-secondary" type="button"
                                    data-bs-dismiss="modal">Close</button><button class="btn btn-primary"
                                    type="submit">Import</button></div>
                    </form>
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
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Kegiatan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Kegiatan</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $schedule->room->number ?? '' }}</td>
                                <td>{!! date('d/m/Y', strtotime($schedule->date_used)) !!}</td>
                                <td>{{ $schedule->start_at }} - {{ $schedule->end_at }}</td>
                                <td>{{ $schedule->activity }}</td>
                                <td>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                        href="{{ route('schedules.edit', $schedule->id) }}"><i data-feather="edit"></i></a>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i
                                            data-feather="trash-2"></i></a>
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
