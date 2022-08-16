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
                                <form method="post" action="{{ route('schedules.store') }}">
                                    @csrf
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (first name)-->
                                        <div class="col-md-12">
                                            <label class="small mb-1">Mata Kuliah</label>
                                            <input class="form-control" id="activity" name="activity" type="text"
                                                placeholder="Enter your event" />
                                        </div>
                                        <!-- Form Group (last name)-->
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label for="building" class="small mb-1">Office</label>
                                            <select class="form-select" aria-label="Default select example" id="building"
                                                name="building">
                                                <option id="select-building" selected disabled>Select an office:</option>
                                                @foreach ($buildings as $building)
                                                    <option value="{{ $building->id }}">
                                                        {{ $building->name . ' Lt.' . $building->floor }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="room" class="small mb-1">Room</label>
                                            <select class="form-select" aria-label="Default select example" id="room"
                                                name="room" onchange="idroom(this.value)">
                                                <option id="select-room" selected disabled>Select a room:</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Form Group (Roles)-->
                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="date_used">Tanggal</label>
                                            <input class="form-control" id="date_used" type="date" name="date_used" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="start_at">Start At</label>
                                            <input class="form-control" id="start_at" type="time" name="start_at" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="end_at">End At</label>
                                            <input class="form-control" id="end_at" type="time" name="end_at" />
                                        </div>
                                    </div>
                                    <!-- Submit button-->
                                    <button class="btn btn-primary" type="submit">Add schedule</button>
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

@push('extra_js')
    <script>
        $('#building').change(function() {
            $("#building option[id='select-building']").hide()
            $.ajax({
                type: 'GET',
                url: '/room-by-building/' + $(this).val(),
                success: function(data) {
                    console.log(data)
                    $('#room').empty().append(
                        data.map(function(item) {
                            return `<option value="${item.id}">${item.number}</option>`
                        })
                    )
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('XHR', xhr);
                    console.log('status', textStatus);
                    console.log('Error in', errorThrown);
                }
            });
        });
    </script>
@endpush
