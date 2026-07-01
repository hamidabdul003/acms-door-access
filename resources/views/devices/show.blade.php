@extends('layouts.master')

@section('title','Device Detail')

@section('content')

<div class="row">

<div class="col-lg-8">

<div class="card">

<div class="card-header">

<h4>

<i class="bi bi-hdd-network"></i>

{{ $device->device_name }}

</h4>

</div>

<div class="card-body">

<table class="table">

<tr>

<th width="180">

UUID

</th>

<td>

{{ $device->uuid }}

</td>

</tr>

<tr>

<th>

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

{{ $device->ip_address ?? '-' }}

</td>

</tr>
<tr>

<th>

MAC Address

</th>

<td>

{{ $device->mac_address ?? '-' }}

</td>

</tr>

<tr>

<th>

Firmware

</th>

<td>

{{ $device->firmware }}

</td>

</tr>

<tr>

<th>

Relay

</th>

<td>

{{ $device->relay_time }} sec

</td>

</tr>

<tr>

<th>

Last Seen

</th>

<td>

{{ $device->last_seen ?? '-' }}

</td>

</tr>

<tr>

<th>

Description

</th>

<td>

{{ $device->description ?? '-' }}

</td>

</tr>

</table>

</div>

</div>

</div>
<div class="col-lg-4">

<div class="card">

<div class="card-body text-center">

@if($device->isOnline())

<span class="badge bg-success fs-6">

ONLINE

</span>

@else

<span class="badge bg-danger fs-6">

OFFLINE

</span>

@endif

<hr>

<button
class="btn btn-primary w-100 mb-2">

<i class="bi bi-lightning"></i>

Test Relay

</button>

<button
<div class="mb-2">

<label class="form-label">

API Key

</label>

<div class="input-group">

<input
type="password"
id="apiKey"
class="form-control"
readonly
value="{{ $device->api_key }}">

<button
class="btn btn-outline-secondary"
type="button"
onclick="toggleApiKey()">

<i class="bi bi-eye"></i>

</button>

<button
class="btn btn-outline-primary"
type="button"
onclick="copyApiKey()">

<i class="bi bi-clipboard"></i>

</button>

</div>

</div>

<i class="bi bi-key"></i>

Copy API Key

</button>

<button
class="btn btn-warning w-100">

<i class="bi bi-arrow-repeat"></i>

Generate API Key

</button>

</div>

</div>

</div>

</div>

@push('scripts')

<script>

function toggleApiKey(){

    const input = document.getElementById('apiKey');

    input.type =
        input.type === 'password'
        ? 'text'
        : 'password';

}

function copyApiKey(){

    navigator.clipboard.writeText(
        document.getElementById('apiKey').value
    );

    Swal.fire({

        icon:'success',

        title:'API Key berhasil disalin',

        timer:1200,

        showConfirmButton:false

    });

}

</script>

@endpush

@endsection
