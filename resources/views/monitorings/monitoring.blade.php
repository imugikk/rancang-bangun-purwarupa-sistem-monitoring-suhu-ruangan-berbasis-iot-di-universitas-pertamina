@extends('layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-4">
                <!-- Knowledge base home header option-->
                <header class="card card-waves">
                    <div class="card-body px-5 pt-4 pb-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-12">
                                <h1 class="text-primary">Monitoring</h1>
                                <p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit facilis ipsam debitis harum!</p>
                                <div class="shadow rounded">
                                    <div class="input-group input-group-joined input-group-joined-xl border-0">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected disabled>Select an office:</option>
                                            <option value="administrator">Griya Legita Lt. 7</option>
                                            <option value="registered">Rektorat Lt. 1</option>
                                            <option value="edtior">Griya Legita Lt. 8</option>
                                            <option value="guest">Griya Legita Lt. 1</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <hr class="mt-4 mb-4" />
                <div class="row">
                    @foreach ($rooms as $room)
                        @if ($room->status === 'safe')
                        <div class="col-lg-3 mb-4">
                            <!-- Knowledge base category card 1-->
                            <a class="card lift lift-sm h-20 bg-success" href="/monitorings/data">
                                <div class="card-body py-5">
                                    <h5 class="card-text text-center">{{ $room->number }}</h5>
                                </div>
                            </a>
                        </div>
                        @endif
                        @if ($room->status === 'warning')
                        <div class="col-lg-3 mb-4">
                            <!-- Knowledge base category card 1-->
                            <a class="card lift lift-sm h-20 bg-warning" href="/monitorings/data">
                                <div class="card-body py-5">
                                    <h5 class="card-text text-center">{{ $room->number }}</h5>
                                </div>
                            </a>
                        </div>
                        @endif
                        @if ($room->status === 'danger')
                        <div class="col-lg-3 mb-4">
                            <!-- Knowledge base category card 1-->
                            <a class="card lift lift-sm h-20 bg-danger" href="/monitorings/data">
                                <div class="card-body py-5">
                                    <h5 class="card-text text-center">{{ $room->number }}</h5>
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                    {{-- 
                    <div class="col-lg-3 mb-4">
                        <!-- Knowledge base category card 1-->
                        <a class="card lift lift-sm h-20 bg-success" href="/monitorings/data">
                            <div class="card-body py-5">
                                <h5 class="card-text text-center">2703</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <!-- Knowledge base category card 1-->
                        <a class="card lift lift-sm h-20 bg-success" href="/monitorings/data">
                            <div class="card-body py-5">
                                <h5 class="card-text text-center">2704</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <!-- Knowledge base category card 1-->
                        <a class="card lift lift-sm h-20 bg-warning" href="/monitorings/data">
                            <div class="card-body py-5">
                                <h5 class="card-text text-center">2705</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <!-- Knowledge base category card 1-->
                        <a class="card lift lift-sm h-20 bg-success" href="/monitorings/data">
                            <div class="card-body py-5">
                                <h5 class="card-text text-center">2706</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <!-- Knowledge base category card 1-->
                        <a class="card lift lift-sm h-20 bg-success" href="/monitorings/data">
                            <div class="card-body py-5">
                                <h5 class="card-text text-center">2707</h5>
                            </div>
                        </a>
                    </div>
                    --}}
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
