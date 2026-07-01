@extends('layouts.master')

@section('title','Edit Card')

@section('content')

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="card">

<div class="card-header bg-white">

<h4>

<i class="bi bi-credit-card"></i>

Edit RFID Card

</h4>

</div>

<div class="card-body">

<form
method="POST"
action="{{ route('cards.update',$card) }}">

@csrf

@method('PUT')
<div class="mb-3">

<label class="form-label">

UID

</label>

<input
class="form-control"
value="{{ $card->uid }}"
disabled>

</div>

<div class="mb-3">

<label class="form-label">

Owner

</label>

<input
name="owner_name"
class="form-control"
value="{{ old('owner_name',$card->owner_name) }}">

</div>

<div class="mb-3">

<label>

Owner Type

</label>

<select
name="owner_type"
class="form-select">

@foreach([
'Guru',
'Siswa',
'Staff',
'Admin',
'Guest'
] as $type)

<option
value="{{ $type }}"
@if($card->owner_type==$type)
selected
@endif>

{{ $type }}

</option>

@endforeach

</select>

</div>
<div class="mb-3">

<label>

Expired

</label>

<input
type="date"
name="expired_at"
class="form-control"
value="{{ optional($card->expired_at)->format('Y-m-d') }}">

</div>

<div class="mb-4">

<label>

Status

</label>

<select
name="status"
class="form-select">

<option
value="1"
@if($card->status)
selected
@endif>

Aktif

</option>

<option
value="0"
@if(!$card->status)
selected
@endif>

Nonaktif

</option>

</select>

</div>

<div class="text-end">

<a
href="{{ route('cards.index') }}"
class="btn btn-secondary">

Kembali

</a>

<button
class="btn btn-primary">

<i class="bi bi-floppy"></i>

Update Card

</button>

</div>

</form>

</div>

</div>

</div>

</div>

@endsection

