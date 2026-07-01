@extends('layouts.master')

@section('title','Dashboard')

@section('content')

<div class="row g-4">

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>Total RFID</small>

                        <h2 class="fw-bold">

                            {{ $totalCards ?? 0 }}

                        </h2>

                    </div>

                    <div>

                        <i class="bi bi-credit-card text-primary fs-1"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>Devices</small>

                        <h2 class="fw-bold">

                            {{ $totalDevices ?? 0 }}

                        </h2>

                    </div>

                    <div>

                        <i class="bi bi-hdd-network text-success fs-1"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>Today's Access</small>

                        <h2 class="fw-bold">

                            {{ $todayAccess ?? 0 }}

                        </h2>

                    </div>

                    <div>

                        <i class="bi bi-door-open text-warning fs-1"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <small>Unknown Card</small>

                        <h2 class="fw-bold">

                            {{ $unknownCard ?? 0 }}

                        </h2>

                    </div>

                    <div>

                        <i class="bi bi-exclamation-circle text-danger fs-1"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card">

            <div class="card-header">

                Recent Activity

            </div>

            <div class="card-body">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>UID</th>

                            <th>Card</th>

                            <th>Device</th>

                            <th>Status</th>

                            <th>Time</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td colspan="5" class="text-center">

                                Belum ada data

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card">

            <div class="card-header">

                Access Today

            </div>

            <div class="card-body">

                <div id="chart"></div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

new ApexCharts(document.querySelector("#chart"),{

    chart:{
        type:'area',
        height:250
    },

    series:[{
        name:'Access',
        data:[0,0,0,0,0,0]
    }],

    xaxis:{
        categories:['07','09','11','13','15','17']
    }

}).render();

</script>

@endpush
