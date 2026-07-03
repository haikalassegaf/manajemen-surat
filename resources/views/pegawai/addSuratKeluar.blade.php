@extends('layouts.main')
@section('title', 'Add Outgoing Mails')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Add Outgoing Mails</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tambahSuratKeluar') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tgl_input_surat">Tanggal Input</label>
                            <input type="date" class="form-control" id="tgl_input_surat" name="tgl_input_surat"
                            value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat">
                            @error('no_surat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select class="form-control" id="jenis" name="jenis">
                                <option value="pilih_jenis">--Pilih Jenis--</option>
                                <option value="Memo">Memo</option>
                                <option value="Nota">Nota</option>
                                <option value="Surat">Surat</option>
                            </select>
                            @error('jenis')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="dari">Dari</label>
                            <input type="text" class="form-control" id="dari" name="dari">
                            @error('dari')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tertuju">Tujuan</label>
                            <input type="text" class="form-control" id="tertuju" name="tertuju">
                            @error('tertuju')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal">
                            @error('perihal')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{ route('pegawai.listSuratKeluar') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    @endsection
