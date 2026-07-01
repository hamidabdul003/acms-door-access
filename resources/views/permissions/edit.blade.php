@extends('layouts.master')

@section('title','Manage Permission')

@section('content')

<div class="row">

    <div class="col-lg-4">

        <div class="card">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-person-badge"></i>

                    Card Information

                </h5>

            </div>

            <div class="card-body">

                <table class="table table-borderless">

                    <tr>

                        <th width="120">UID</th>

                        <td>

                            <code>{{ $card->uid }}</code>

                        </td>

                    </tr>

                    <tr>

                        <th>Owner</th>

                        <td>{{ $card->owner_name }}</td>

                    </tr>

                    <tr>

                        <th>Type</th>

                        <td>

                            <span class="badge bg-primary">

                                {{ $card->owner_type }}

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <th>Status</th>

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

                    </tr>

                    <tr>

                        <th>Expired</th>

                        <td>

                            {{ $card->expired_at?->format('d M Y') ?? '-' }}

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-8">

        <div class="card">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-shield-lock"></i>

                    Device Permission

                </h5>

            </div>

            <div class="card-body">

                <form
                    action="{{ route('permissions.update',$card) }}"
                    method="POST">

                    @csrf

                    @method('PUT')

<div class="row">

@forelse($devices as $device)

<div class="col-md-6 mb-3">

<div class="form-check border rounded-3 p-3 shadow-sm">

<input
    class="form-check-input"
    type="checkbox"
    name="devices[]"
    value="{{ $device->id }}"
    id="device{{ $device->id }}"
    @checked(in_array($device->id, $selected))>

<label
    class="form-check-label w-100"
    for="device{{ $device->id }}">

    <strong>

        <i class="bi bi-hdd-network"></i>

        {{ $device->device_name }}

    </strong>

    <br>

    <small class="text-muted">

        {{ $device->location }}

    </small>

    <br>

    @if($device->status)

        <span class="badge bg-success">

            Online

        </span>

    @else

        <span class="badge bg-secondary">

            Offline

        </span>

    @endif

</label>

</div>

</div>

@empty

<div class="col-12">

<div class="alert alert-warning">

<i class="bi bi-exclamation-circle"></i>

Belum ada device yang terdaftar.

</div>

</div>

@endforelse

</div>

<hr class="my-4">

<div class="d-flex justify-content-between align-items-center">

    <div>

        <button
            type="button"
            class="btn btn-outline-primary btn-sm"
            onclick="selectAllDevices()">

            <i class="bi bi-check2-square"></i>

            Select All

        </button>

        <button
            type="button"
            class="btn btn-outline-secondary btn-sm"
            onclick="clearAllDevices()">

            <i class="bi bi-square"></i>

            Clear All

        </button>

    </div>

    <div>

        <a href="{{ route('permissions.index') }}"
           class="btn btn-light">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

        <button
            type="submit"
            class="btn btn-primary">

            <i class="bi bi-floppy"></i>

            Save Permission

        </button>

    </div>

</div>

</form>

</div>

</div>

</div>

</div>

@endsection


@push('scripts')

<script>

function selectAllDevices(){

    document.querySelectorAll(
        'input[name="devices[]"]'
    ).forEach(cb=>{

        cb.checked=true;

        updateCard(cb);

    });

}

function clearAllDevices(){

    document.querySelectorAll(
        'input[name="devices[]"]'
    ).forEach(cb=>{

        cb.checked=false;

        updateCard(cb);

    });

}

function updateCard(checkbox){

    const card=checkbox.closest('.form-check');

    if(!card) return;

    if(checkbox.checked){

        card.classList.add(
            'border-primary',
            'bg-primary-subtle'
        );

    }else{

        card.classList.remove(
            'border-primary',
            'bg-primary-subtle'
        );

    }

}

document.addEventListener(
    'DOMContentLoaded',
    ()=>{

        document
        .querySelectorAll(
            'input[name="devices[]"]'
        )
        .forEach(cb=>{

            updateCard(cb);

            cb.addEventListener(
                'change',
                ()=>updateCard(cb)
            );

        });

    }
);

</script>

@endpush
