@extends('layouts.master')

@section('title', 'Device Detail')

@section('content')
<div class="row g-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-hdd-network text-primary me-2"></i>
                    {{ $device->device_name }}
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless align-middle">
                    <tr>
                        <th width="120" class="text-muted">Location</th>
                        <td>{{ $device->location }}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">IP Address</th>
                        <td>
                            <code>{{ $device->ip_address }}</code>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-muted">Status</th>
                        <td>
                            @if($device->status)
                                <span class="badge bg-success">Online</span>
                            @else
                                <span class="badge bg-danger">Offline</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0"><i class="bi bi-sliders text-primary me-2"></i>Device Control & Monitoring</h5>
            </div>
            <div class="card-body">
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <button type="button" class="btn btn-primary w-100" onclick="copyApiKey()">
                            <i class="bi bi-clipboard me-1"></i> Copy API Key
                        </button>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <form action="{{ route('devices.regenerate-key', $device) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="bi bi-key me-1"></i> Generate Key
                            </button>
                        </form>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <button class="btn btn-success w-100" disabled>
                            <i class="bi bi-broadcast me-1"></i> Test Relay
                        </button>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <button class="btn btn-danger w-100" disabled>
                            <i class="bi bi-arrow-clockwise"></i> Restart Device
                        </button>
                    </div>
                </div>

                <div class="alert alert-info mb-4">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Remote control akan aktif setelah firmware ESP32 terhubung dengan endpoint API.
                </div>

                <div class="row g-3">
                    <div class="col-sm-6 col-md-3">
                        <div class="card border-success bg-light-success h-100">
                            <div class="card-body text-center py-3">
                                <i class="bi bi-heart-pulse fs-3 text-success"></i>
                                <small class="text-muted d-block mt-2">Device Status</small>
                                <span class="fw-bold text-success d-block mt-1">
                                    {{ $device->status ? 'ONLINE' : 'OFFLINE' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card h-100">
                            <div class="card-body text-center py-3">
                                <i class="bi bi-wifi fs-3 text-primary"></i>
                                <small class="text-muted d-block mt-2">WiFi RSSI</small>
                                <span class="fw-bold d-block mt-1">--</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card h-100">
                            <div class="card-body text-center py-3">
                                <i class="bi bi-memory fs-3 text-warning"></i>
                                <small class="text-muted d-block mt-2">Free Heap</small>
                                <span class="fw-bold d-block mt-1">--</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="card h-100">
                            <div class="card-body text-center py-3">
                                <i class="bi bi-clock-history fs-3 text-info"></i>
                                <small class="text-muted d-block mt-2">Last Seen</small>
                                <span class="fw-bold d-block mt-1 text-truncate px-1">
                                    @if($device->last_seen)
                                        {{ \Carbon\Carbon::parse($device->last_seen)->diffForHumans() }}
                                    @else
                                        Never
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

async function copyApiKey(){
    const input = document.getElementById('apikey');
    if(!input) {
        // Fallback jika elemen apikey belum didefinisikan di view
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Elemen API Key tidak ditemukan.',
        });
        return;
    }
    await navigator.clipboard.writeText(input.value);

    Swal.fire({
        icon: 'success',
        title: 'Copied',
        text: 'API Key berhasil disalin.',
        timer: 1500,
        showConfirmButton: false
    });
}
</script>
@endpush
