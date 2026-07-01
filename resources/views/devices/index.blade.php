@extends('layouts.master')

@section('title', 'Device Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">
            <i class="bi bi-hdd-network text-primary me-2"></i>Device Management
        </h3>
        <small class="text-muted">
            ESP32 Door Controller
        </small>
    </div>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDeviceModal">
        <i class="bi bi-plus-circle me-1"></i> Add Device
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    @forelse($devices as $device)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="mb-0">
                            <a href="{{ route('devices.show', $device) }}" class="text-decoration-none fw-bold text-dark">
                                {{ $device->device_name }}
                            </a>
                        </h5>
                        @if($device->isOnline())
                            <span class="badge bg-success">Online</span>
                        @else
                            <span class="badge bg-danger">Offline</span>
                        @endif
                    </div>
                    
                    <hr class="text-muted opacity-25">

                    <p class="mb-2">
                        <i class="bi bi-geo-alt text-muted me-2"></i>{{ $device->location }}
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-router text-muted me-2"></i><code>{{ $device->ip_address ?? '-' }}</code>
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-cpu text-muted me-2"></i>Firmware: <b>{{ $device->firmware ?? 'v1.0' }}</b>
                    </p>
                    <p class="mb-3">
                        <i class="bi bi-lightning-charge text-muted me-2"></i>Relay: <b>{{ $device->relay_time }} sec</b>
                    </p>

                    <div class="row g-2 pt-2 border-top">
                        <div class="col-6">
                            <a href="{{ route('devices.edit', $device) }}" class="btn btn-outline-warning btn-sm w-100">
                                <i class="bi bi-pencil me-1"></i> Edit
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('devices.show', $device) }}" class="btn btn-outline-secondary btn-sm w-100">
                                <i class="bi bi-key me-1"></i> API Key
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('devices.show', $device) }}" class="btn btn-outline-info btn-sm w-100">
                                <i class="bi bi-lightning me-1"></i> Test Relay
                            </a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('devices.destroy', $device) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus Device {{ $device->device_name }}?')" class="btn btn-outline-danger btn-sm w-100">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-light text-center border py-5">
                <i class="bi bi-hdd-network display-6 text-muted d-block mb-3"></i>
                <span class="text-muted">Belum ada Device yang terdaftar.</span>
            </div>
        </div>
    @endforelse
</div>

<div class="modal fade" id="addDeviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('devices.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New Device</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Device Name</label>
                        <input type="text" name="device_name" class="form-control" placeholder="e.g. Lab TKJ Door" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="e.g. Gedung A Lantai 2" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Relay Time (Seconds)</label>
                        <input type="number" name="relay_time" value="3" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Opsional..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save Device</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
