@extends('layouts.app')
@section('title', 'Edit Employee')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Employee</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('pegawai.update', $pegawai->nip) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="number" class="form-control" id="nip" name="nip"
                                value="{{ isset($pegawai) ? $pegawai->nip : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ isset($pegawai) ? $pegawai->name : '' }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ isset($pegawai) ? $pegawai->email : '' }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="ACR" {{ $pegawai->unit === 'ACR' ? 'selected' : '' }}>ACR</option>
                                <option value="Consumer" {{ $pegawai->unit === 'Consumer' ? 'selected' : '' }}>Consumer
                                </option>
                                <option value="FTRM" {{ $pegawai->unit === 'FTRM' ? 'selected' : '' }}>FTRM</option>
                                <option value="RBC" {{ $pegawai->unit === 'RBC' ? 'selected' : '' }}>RBC</option>
                                <option value="Risk" {{ $pegawai->unit === 'Risk' ? 'selected' : '' }}>Risk</option>
                                <option value="SME" {{ $pegawai->unit === 'SME' ? 'selected' : '' }}>SME</option>
                                <option value="Operasional" {{ $pegawai->unit === 'Operasional' ? 'selected' : '' }}>
                                    Operasional</option>
                            </select>
                            @error('unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="no_telepon" class="form-control form-control-user" id="no_telepon"
                                placeholder="no telepon" name="no_telepon"
                                value="{{ isset($pegawai) ? $pegawai->no_telepon : '' }}">
                            @error('no_telepon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="0" {{ $pegawai->role === '0' ? 'selected' : '' }}>Pegawai</option>
                                <option value="1" {{ $pegawai->role === '1' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/employee-account" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    @endsection
