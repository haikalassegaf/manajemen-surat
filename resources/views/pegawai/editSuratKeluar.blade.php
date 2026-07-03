@extends('layouts.main')
@section('title', 'Edit Outgoing Mails')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Outgoing Mails</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpan.SuratKeluar', $suratkeluar->no_surat) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tgl_input_surat">Tanggal Input</label>
                            <input type="date" class="form-control" id="tgl_input_surat" name="tgl_input_surat"
                                value="{{ isset($suratkeluar) ? $suratkeluar->tgl_input_surat : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat"
                                value="{{ isset($suratkeluar) ? $suratkeluar->no_surat : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input class="form-control" id="jenis" name="jenis"
                                value="{{ isset($suratkeluar) ? $suratkeluar->jenis : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input class="form-control" id="pengirim" name="pengirim"
                                value="{{ isset($suratkeluar) ? $suratkeluar->pengirim : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="dari">Dari</label>
                            <input type="text" class="form-control" id="dari" name="dari"
                                value="{{ isset($suratkeluar) ? $suratkeluar->dari : '' }}">
                            @error('dari')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tertuju">Tujuan</label>
                            <input type="text" class="form-control" id="tertuju" name="tertuju"
                                value="{{ isset($suratkeluar) ? $suratkeluar->tertuju : '' }}">
                            @error('tertuju')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal"
                                value="{{ isset($suratkeluar) ? $suratkeluar->perihal : '' }}">
                            @error('perihal')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('pegawai.listSuratKeluar') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    @endsection
