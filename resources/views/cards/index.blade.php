@extends('layouts.master')

@section('title','RFID Cards')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h3 class="fw-bold">

            <i class="bi bi-credit-card-2-front"></i>

            RFID Card Management

        </h3>

        <small class="text-muted">

            Kelola seluruh kartu RFID

        </small>

    </div>

    <button
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#addCardModal">

        <i class="bi bi-plus-circle"></i>

        Register Card

    </button>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card">

<div class="card-body">

<table class="table table-hover align-middle">

<thead>

<tr>

<th>UID</th>

<th>Owner</th>

<th>Type</th>

<th>Status</th>

<th width="180">Action</th>

</tr>

</thead>

<tbody>
@forelse($cards as $card)

<tr>

<td>

<code>

{{ $card->uid }}

</code>

</td>

<td>

{{ $card->owner_name }}

</td>

<td>

<span class="badge bg-primary">

{{ $card->owner_type }}

</span>

</td>

<td>

@if($card->status)

<span class="badge bg-success">

Aktif

</span>

@else

<span class="badge bg-danger">

Nonaktif

</span>

@endif

</td>

<td>
<a
    href="{{ route('cards.edit',$card) }}"
    class="btn btn-warning btn-sm">

    <i class="bi bi-pencil"></i>

</a>

<form
    action="{{ route('cards.toggle',$card) }}"
    method="POST"
    class="d-inline">

    @csrf

    <button
        class="btn btn-info btn-sm">

        @if($card->status)

        <i class="bi bi-lock"></i>

        @else

        <i class="bi bi-unlock"></i>

        @endif

    </button>

</form>

<form
    action="{{ route('cards.destroy',$card) }}"
    method="POST"
    class="d-inline">

    @csrf

    @method('DELETE')

    <button
        onclick="return confirm('Hapus kartu ini?')"
        class="btn btn-danger btn-sm">

        <i class="bi bi-trash"></i>

    </button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center py-5">

<i class="bi bi-credit-card display-4 text-secondary"></i>

<br><br>

Belum ada kartu RFID.

</td>

</tr>

@endforelse
</tbody>

</table>

</div>

</div>

<div
class="modal fade"
id="addCardModal">

<div class="modal-dialog">

<div class="modal-content">

<form
method="POST"
action="{{ route('cards.store') }}">

@csrf

<div class="modal-header">

<h5>Register RFID Card</h5>

<button
class="btn-close"
data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">
<div class="mb-3">

<label>UID RFID</label>

<input
name="uid"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Owner Name</label>

<input
name="owner_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Owner Type</label>

<select
name="owner_type"
class="form-select">

<option>Guru</option>

<option>Siswa</option>

<option>Staff</option>

<option>Admin</option>

<option>Guest</option>

</select>

</div>

<div class="mb-3">

<label>Expired</label>

<input
type="date"
name="expired_at"
class="form-control">

</div>

</div>

<div class="modal-footer">

<button
type="button"
class="btn btn-secondary"
data-bs-dismiss="modal">

Cancel

</button>

<button
class="btn btn-primary">

Save Card

</button>

</div>

</form>

</div>

</div>

</div>

@endsection
