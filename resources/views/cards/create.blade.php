@extends('layouts.master')

@section('title','Register RFID Card')

@section('content')

<div class="card">

    <div class="card-header">

        <h4>

            Register RFID Card

        </h4>

    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('cards.store') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    UID RFID

                </label>

                <div class="input-group">

                    <input type="text"

                           name="uid"

                           class="form-control"

                           required>

                    <button class="btn btn-outline-primary"

                            type="button">

                        <i class="bi bi-broadcast"></i>

                        Scan RFID

                    </button>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Nama Pemilik

                </label>

                <input type="text"

                       name="owner_name"

                       class="form-control"

                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Role

                </label>

                <select name="role"

                        class="form-select">

                    <option>Guru</option>

                    <option>Siswa</option>

                    <option>Staff</option>

                    <option>Admin</option>

                    <option>Tamu</option>

                </select>

            </div>

            <div class="text-end">

                <button class="btn btn-success">

                    <i class="bi bi-save"></i>

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
