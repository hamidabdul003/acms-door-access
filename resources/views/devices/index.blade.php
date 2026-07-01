@extends('layouts.master')

@section('title','Device Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold mb-1">

            <i class="bi bi-hdd-network"></i>

            Device Management

        </h3>

        <small class="text-muted">

            ESP32 Door Controller

        </small>

    </div>

<button
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#addDeviceModal">

<i class="bi bi-plus-circle"></i>

Add Device

</button>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="row">
@forelse($devices as $device)

<div class="col-lg-4 col-md-6 mb-4">

<div class="card h-100">

<div class="card-body">

<div class="d-flex justify-content-between">

<h5>

<a
href="{{ route('devices.show',$device) }}"
class="text-decoration-none fw-bold">

{{ $device->device_name }}

</a>

</h5>

@if($device->isOnline())

<span class="badge bg-success">

Online

</span>

@else

<span class="badge bg-danger">

Offline

</span>

@endif

</div>

<hr>

<p>

<i class="bi bi-geo-alt"></i>

{{ $device->location }}

</p>

<p>

<i class="bi bi-router"></i>

{{ $device->ip_address ?? '-' }}

</p>

<p>

<i class="bi bi-cpu"></i>

Firmware

<b>

{{ $device->firmware }}

</b>

</p>

<p>

<i class="bi bi-lightning-charge"></i>

Relay

<b>

{{ $device->relay_time }} sec

</b>

</p>
<div class="mt-3 d-grid gap-2">

<a href="{{ route('devices.edit',$device) }}"
class="btn btn-warning">

<i class="bi bi-pencil"></i>

Edit

</a>

<button class="btn btn-secondary">

<i class="bi bi-key"></i>

API Key

</button>

<button class="btn btn-info text-white">

<i class="bi bi-lightning"></i>

Test Relay

</button>

<form
action="{{ route('devices.destroy',$device) }}"
method="POST">

@csrf

@method('DELETE')

<button
onclick="return confirm('Hapus Device?')"
class="btn btn-danger w-100">

<i class="bi bi-trash"></i>

Delete

</button>

</form>

</div>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-light text-center">

Belum ada Device.

</div>

</div>

@endforelse

</div>

<div class="modal fade" id="addDeviceModal">

<div class="modal-dialog">

<div class="modal-content">

<form method="POST"
action="{{ route('devices.store') }}">

@csrf

<div class="modal-header">

<h5>Add Device</h5>

<button
class="btn-close"
data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

<div class="mb-3">

<label>Device Name</label>

<input
type="text"
name="device_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Location</label>

<input
type="text"
name="location"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Relay Time</label>

<input
type="number"
name="relay_time"
value="3"
class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea
name="description"
class="form-control"></textarea>

</div>

</div>

<div class="modal-footer">

<button
class="btn btn-secondary"
data-bs-dismiss="modal"
type="button">

Cancel

</button>

<button
class="btn btn-primary">

Save Device

</button>

</div>

</form>

</div>

</div>

</div>

@endsection
