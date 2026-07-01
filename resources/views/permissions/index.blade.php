@extends('layouts.master')

@section('title','Permission Management')

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    <i class="bi bi-check-circle-fill"></i>

    {{ session('success') }}

    <button class="btn-close"
            data-bs-dismiss="alert"></button>

</div>

@endif

<div class="card">

<div class="card-header bg-white">

<div class="d-flex justify-content-between align-items-center">

<div>

<h4 class="mb-1">

<i class="bi bi-shield-lock"></i>

Permission Management

</h4>

<small class="text-muted">

Kelola hak akses kartu ke setiap device

</small>

</div>

</div>

</div>

<div class="card-body">

<table
id="permissionTable"
class="table table-hover align-middle">

<thead>

<tr>

<th>UID</th>

<th>Owner</th>

<th>Type</th>

<th>Status</th>

<th width="150">

Action

</th>

</tr>

</thead>

<tbody>

@forelse($cards as $card)

<tr>

    <td>

        <code>{{ $card->uid }}</code>

    </td>

    <td>

        <strong>{{ $card->owner_name }}</strong>

    </td>

    <td>

        <span class="badge bg-primary">

            {{ $card->owner_type }}

        </span>

    </td>

    <td>

        @if($card->status)

            <span class="badge bg-success">

                Active

            </span>

        @else

            <span class="badge bg-danger">

                Disabled

            </span>

        @endif

    </td>

    <td>

        <a href="{{ route('permissions.edit',$card) }}"
           class="btn btn-primary btn-sm">

            <i class="bi bi-shield-lock"></i>

            Manage

        </a>

    </td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center py-5">

<i class="bi bi-credit-card display-5 text-secondary"></i>

<br><br>

Belum ada kartu RFID yang terdaftar.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection

<hr class="my-4">

<div class="d-flex justify-content-between align-items-center">

    <small class="text-muted">

        Total Card :
        <strong>{{ $cards->count() }}</strong>

    </small>

    <a href="{{ route('permissions.index') }}"
       class="btn btn-outline-primary btn-sm">

        <i class="bi bi-arrow-clockwise"></i>

        Refresh

    </a>

</div>

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    new DataTable('#permissionTable', {

        responsive: true,

        pageLength: 10,

        order: [[1, 'asc']],

        language: {

            search: "Cari : ",

            lengthMenu: "Tampilkan _MENU_ data",

            info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",

            zeroRecords: "Data tidak ditemukan",

            emptyTable: "Belum ada data",

            paginate: {

                first: "Awal",

                last: "Akhir",

                next: "›",

                previous: "‹"

            }

        }

    });

});

</script>
