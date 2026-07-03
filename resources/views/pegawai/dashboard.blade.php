@extends('layouts.main')

@section('title', 'Dashboard')

@section('contents')

    <h6 class="text-sm font-large text-gray-900 truncate dark:text-gray-300 mb-3" role="none"><strong>
            Welcome, {{ auth()->user()->name }}!</strong>
    </h6>

    <div class="row">
        <div class="col-lg-8 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3 mb-4">
                    <h6 class="m-0 font-weight-bold text-info">Profile Pegawai</h6>
                </div>
                <div class="card-body text-center py-8">
                    <div class="row justify-content-center align-items-center text-center">
                        <div class="flex flex-col items-center pb-10 text-center mb-3">
                            <img class="img-profile rounded-circle mb-4" src="img/undraw_profile.svg"
                                style="width: 150px; height: 150px;">
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white mb-2">
                                {{ auth()->user()->name }}
                            </h5>
                            <h6 class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                {{ auth()->user()->nip }}
                            </h6>
                            <h6 class="text-sm text-gray-500 dark:text-gray-400">
                                {{ auth()->user()->email }}
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info">Mails Resume</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-0 pb-0">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Surat Masuk
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Surat Keluar
                        </span><br>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Pengiriman Surat
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Verifikasi Surat
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center">
        <div class="col-lg-12 mb-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Mails Monitoring</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-3 py-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Surat Masuk</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">40</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-3 py-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                                Surat Keluar</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">35</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-3 py-2">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">
                                                Pengiriman Surat</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">20</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 mb-3 py-2">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Verifikasi Surat</div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">27</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
