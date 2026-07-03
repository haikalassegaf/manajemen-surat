@extends('layouts.main')
@section('title', 'Edit Incoming Mails')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Incoming Mails</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpan.SuratMasuk', $suratmasuk->no_surat) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tgl_surat_masuk">Tanggal Surat Masuk</label>
                            <input type="date" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk"
                                value="{{ isset($suratmasuk) ? $suratmasuk->tgl_surat_masuk : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat"
                                value="{{ isset($suratmasuk) ? $suratmasuk->no_surat : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input class="form-control" id="jenis" name="jenis"
                                value="{{ isset($suratmasuk) ? $suratmasuk->jenis : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pembuatan">Tanggal Pembuatan Surat</label>
                            <input type="date" class="form-control" id="tgl_pembuatan" name="tgl_pembuatan"
                                value="{{ isset($suratmasuk) ? $suratmasuk->tgl_pembuatan : '' }}">
                            @error('tgl_pembuatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penerima">Penerima</label>
                            <input class="form-control" id="penerima" name="penerima"
                                value="{{ isset($suratmasuk) ? $suratmasuk->penerima : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="dari">Dari</label>
                            <input type="text" class="form-control" id="dari" name="dari"
                                value="{{ isset($suratmasuk) ? $suratmasuk->dari : '' }}">
                            @error('dari')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tertuju">Tujuan</label>
                            <input type="text" class="form-control" id="tertuju" name="tertuju"
                                value="{{ isset($suratmasuk) ? $suratmasuk->tertuju : '' }}">
                            @error('tertuju')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal"
                                value="{{ isset($suratmasuk) ? $suratmasuk->perihal : '' }}">
                            @error('perihal')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('pegawai.listSuratMasuk') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    @endsection
