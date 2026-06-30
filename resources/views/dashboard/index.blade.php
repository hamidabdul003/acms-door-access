@extends('layouts.master')

@section('title','Dashboard')

@section('content')

<div class="row g-4">

    <div class="col-md-3">
        <div class="card card-stat">
            <div class="card-body">
                <h6>Total RFID Card</h6>
                <h2>{{ $totalCards }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat">
            <div class="card-body">
                <h6>Total Device</h6>
                <h2>{{ $totalDevices }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat">
            <div class="card-body">
                <h6>Today's Access</h6>
                <h2>{{ $todayAccess }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stat">
            <div class="card-body">
                <h6>Unknown Card</h6>
                <h2>{{ $unknownCards }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4 card-stat">

    <div class="card-header">

        Recent Activity

    </div>

    <div class="card-body">

        <table class="table">

            <thead>

            <tr>

                <th>UID</th>
                <th>Device</th>
                <th>Time</th>

            </tr>

            </thead>

            <tbody>

            @forelse($recentLogs as $log)

                <tr>

                    <td>{{ $log->uid }}</td>

                    <td>{{ $log->device }}</td>

                    <td>{{ $log->created_at }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center">

                        Belum ada data

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
