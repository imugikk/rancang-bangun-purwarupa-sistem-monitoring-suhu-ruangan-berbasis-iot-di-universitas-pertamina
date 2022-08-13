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
                                Add Room
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="/rooms">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Back to Rooms List
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
                        <div class="card-header">Rooms Details</div>
                        <div class="card-body">
                            <form method="post" action="{{ route('rooms.store') }}">
                                @csrf
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1">Ruangan</label>
                                        <input class="form-control" id="number" type="text" placeholder="Enter your room number" name="number"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1">Sensor</label>
                                        <select class="form-select" aria-label="Default select example" name="device">
                                            <option selected disabled>Select a sensor:</option>
                                            @foreach ($devices as $device)
                                                <option value="{{ $device->id }}">{{$device->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Form Group (Roles)-->
                                <div class="mb-3">
                                    <label class="small mb-1">Office</label>
                                    <select class="form-select" aria-label="Default select example" name="building">
                                        <option selected disabled>Select an office:</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->building->id }}">{{$room->building->name . ' Lt.' . $room->building->floor }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" id="groupDevs" type="checkbox" value="" />
                                        <label class="form-check-label" for="groupDevs">Add new office</label>
                                    </div> --}}
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Add room</button>
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
