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
                                    Rooms List
                                </h1>
                            </div>
                            <div class="col-12 col-xl-auto mb-3">
                                <a class="btn btn-sm btn-light text-primary" href="{{ route('rooms.create') }}">
                                    <i class="me-1" data-feather="plus"></i>
                                    Add Rooms
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
                                    <th>Alat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Ruangan</th>
                                    <th>Gedung</th>
                                    <th>Alat</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($rooms as $room)
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{ $room->number }}
                                            </div>
                                        </td>
                                        <td>{{ $room->building->name . ' Lt.' . $room->building->floor }}</td>
                                        <td>
                                            <span class="badge bg-green-soft text-green">{{ $room->device->name }}</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                                href="{{ route('rooms.edit', $room->id) }}"><i data-feather="edit"></i></a>
                                            <form class="d-inline" method="post"
                                                action="{{ route('rooms.destroy', $room->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-datatable btn-icon btn-transparent-dark"><i
                                                        data-feather="trash-2"></i>
                                                </button>
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
