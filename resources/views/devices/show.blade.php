@extends('layouts.master')

@section('title','Device Detail')

@section('content')

<div class="row">

<div class="col-lg-4">

<div class="card">

<div class="card-header bg-white">

<h4>

<i class="bi bi-hdd-network"></i>

{{ $device->device_name }}

</h4>

</div>

<div class="card-body">

<table class="table table-borderless">

<tr>

<th width="120">

Location

</th>

<td>

{{ $device->location }}

</td>

</tr>

<tr>

<th>

IP Address

</th>

<td>

<code>

{{ $device->ip_address }}

</code>

</td>

</tr>

<tr>

<th>

Status

</th>

<td>

@if($device->status)

<span class="badge bg-success">

Online

</span>

@else

<span class="badge bg-danger">

Offline

</span>

@endif

</td>

</tr>

@extends('layouts.master')

@section('title','Device Detail')

@section('content')

<div class="row">

<div class="col-lg-4">

<div class="card">

<div class="card-header bg-white">

<h4>

<i class="bi bi-hdd-network"></i>

{{ $device->device_name }}

</h4>

</div>

<div class="card-body">

<table class="table table-borderless">

<tr>

<th width="120">

Location

</th>

<td>

{{ $device->location }}

</td>

</tr>

<tr>

<th>

IP Address

</th>

<td>

<code>

{{ $device->ip_address }}

</code>

</td>

</tr>

<tr>

<th>

Status

</th>

<td>

@if($device->status)

<span class="badge bg-success">

Online

</span>

@else

<span class="badge bg-danger">

Offline

</span>

@endif

</td>

</tr>

<div class="row g-3">

    <div class="col-md-6">

        <button
            type="button"
            class="btn btn-primary w-100"
            onclick="copyApiKey()">

            <i class="bi bi-clipboard"></i>

            Copy API Key

        </button>

    </div>

    <div class="col-md-6">

        <form
            action="{{ route('devices.regenerate-key', $device) }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="btn btn-warning w-100">

                <i class="bi bi-key"></i>

                Generate API Key

            </button>

        </form>

    </div>

    <div class="col-md-6">

        <button
            class="btn btn-success w-100"
            disabled>

            <i class="bi bi-broadcast"></i>

            Test Relay

        </button>

    </div>

    <div class="col-md-6">

        <button
            class="btn btn-danger w-100"
            disabled>

            <i class="bi bi-arrow-clockwise"></i>

            Restart Device

        </button>

    </div>

</div>

<hr class="my-4">

<div class="alert alert-info mb-0">

    <i class="bi bi-info-circle"></i>

    Remote control akan aktif setelah firmware ESP32
    terhubung dengan endpoint API.

</div>

<hr class="my-4">

<div class="row g-3">

    <div class="col-md-3">

        <div class="card border-success">

            <div class="card-body text-center">

                <i class="bi bi-heart-pulse fs-2 text-success"></i>

                <h6 class="mt-2 mb-0">

                    Device Status

                </h6>

                <strong>

                    {{ $device->status ? 'ONLINE' : 'OFFLINE' }}

                </strong>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <i class="bi bi-wifi fs-2 text-primary"></i>

                <h6 class="mt-2 mb-0">

                    WiFi RSSI

                </h6>

                <strong>

                    --

                </strong>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <i class="bi bi-memory fs-2 text-warning"></i>

                <h6 class="mt-2 mb-0">

                    Free Heap

                </h6>

                <strong>

                    --

                </strong>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                <i class="bi bi-clock-history fs-2 text-info"></i>

                <h6 class="mt-2 mb-0">

                    Last Seen

                </h6>

                <strong>

                    @if($device->last_seen)

                        {{ \Carbon\Carbon::parse($device->last_seen)->diffForHumans() }}

                    @else

                        Never

                    @endif

                </strong>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

function toggleApiKey(){

    const input=document.getElementById('apikey');

    input.type=input.type==='password'
        ?'text'
        :'password';

}

async function copyApiKey(){

    const input=document.getElementById('apikey');

    await navigator.clipboard.writeText(
        input.value
    );

    Swal.fire({

        icon:'success',

        title:'Copied',

        text:'API Key berhasil disalin.',

        timer:1500,

        showConfirmButton:false

    });

}

</script>

@endpush
