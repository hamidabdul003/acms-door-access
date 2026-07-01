@extends('layouts.master')

@section('title', 'Permission Management')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">
                    <i class="bi bi-shield-lock text-primary me-2"></i>
                    Permission Management
                </h4>
                <small class="text-muted">
                    Kelola hak akses kartu ke setiap device
                </small>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="permissionTable" class="table table-hover align-middle w-100">
            <thead>
                <tr>
                    <th>UID</th>
                    <th>Owner</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th width="150">Action</th>
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
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Disabled</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('permissions.edit', $card) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-shield-lock me-1"></i> Manage
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="bi bi-credit-card display-5 text-secondary d-block mb-3"></i>
                            <span class="text-muted">Belum ada kartu RFID yang terdaftar.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr class="my-4">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">
                Total Card : <strong>{{ $cards->count() }}</strong>
            </small>
            <a href="{{ route('permissions.index') }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh
            </a>
        </div>
    </div>
</div>

@endsection

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
@endpush
