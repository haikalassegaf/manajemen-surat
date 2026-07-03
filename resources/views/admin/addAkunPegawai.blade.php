@extends('layouts.app')
@section('title', 'Add Employee')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Add Employee</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('addPegawai') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="name" class="form-control form-control-user" id="name"
                                aria-describedby="emailHelp" placeholder="Enter Name..." name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="nip" class="form-control form-control-user" id="nip"
                                aria-describedby="emailHelp" placeholder="NIP" name="nip">
                            @error('nip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-user"id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                placeholder="Password" name="password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="pilih_unit">--Pilih Unit--</option>
                                <option value="ACR">ACR</option>
                                <option value="Consumer">Consumer</option>
                                <option value="FTRM">FTRM</option>
                                <option value="RBC">RBC</option>
                                <option value="Risk">Risk</option>
                                <option value="SME">SME</option>
                                <option value="Operasional">Operasional</option>
                            </select>
                            @error('unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="no_telepon" class="form-control form-control-user" id="no_telepon"
                                placeholder="no telepon" name="no_telepon">
                            @error('no_telepon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" accept=".jpg" accept=".png" id="foto" name="foto">
                    </div> --}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{ route('pegawai') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @endsection
