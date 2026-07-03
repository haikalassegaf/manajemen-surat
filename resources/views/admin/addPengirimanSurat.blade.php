@extends('layouts.app')
@section('title', 'Add Delivery Mails')

@section('contents')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Add Delivery Mails</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tambahPengiriman', $suratpengiriman->no_surat) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                            <input type="date" class="form-control" id="tanggal_pengiriman" name="tgl_pengiriman"
                                value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor_surat" name="no_surat"
                                value="{{ isset($suratpengiriman) ? $suratpengiriman->no_surat : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Surat</label>
                            <input type="text" class="form-control" id="jenis" name="jenis"
                                value="{{ isset($suratpengiriman) ? $suratpengiriman->jenis : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pengirim">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim" name="pengirim"
                                value="{{ isset($suratpengiriman) ? $suratpengiriman->pengirim : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="from">Dari</label>
                                <input type="text" class="form-control" id="from" name="dari"
                                    value="{{ isset($suratpengiriman) ? $suratpengiriman->dari : '' }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tertuju">Tujuan</label>
                            <input type="text" class="form-control" id="tertuju" name="tertuju"
                                value="{{ isset($suratpengiriman) ? $suratpengiriman->tertuju : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="perihal">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal"
                                value="{{ isset($suratpengiriman) ? $suratpengiriman->perihal : '' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pengiriman">Jenis Pengiriman</label>
                            <select class="form-control" id="jenis_pengiriman" name="jenis_pengiriman">
                                <option value="pilih_jenis">--Pilih Jenis--</option>
                                <option value="ekspedisi">Ekspedisi</option>
                                <option value="lokasi">Lokasi</option>
                            </select>
                            @error('jenis_pengiriman')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" id="ekspedisi_field" style="display: none;">
                            <label for="ekspedisi">Ekspedisi</label>
                            <select class="form-control" id="ekspedisi" name="ekspedisi">
                                <option value="JNE">JNE</option>
                                <option value="POST">POST</option>
                                <option value="JNT">JNT</option>
                            </select>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#jenis_pengiriman').change(function() {
                                    if ($(this).val() === 'ekspedisi') {
                                        $('#ekspedisi_field').show();
                                    } else {
                                        $('#ekspedisi_field').hide();
                                    }
                                });
                            });
                        </script>
                        <div class="form-group" id="penerima_field">
                            <label for="penerima">Penerima</label>
                            <input type="text" class="form-control" id="penerima" name="penerima">
                            @error('penerima')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">Bukti Foto</label>
                            <input type="file" class="form-control" id="file" name="file"
                                onchange="previewImage(this);">
                            <img id="preview" src="#" alt="Preview"
                                style="display: none; max-width: 100%; height: auto;">
                            @error('bukti_foto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{ route('listSuratKeluar') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection




{{-- <div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Add Delivery Mails</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('tambahPengiriman', $suratpengiriman->no_surat) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                        <input type="date" class="form-control" id="tanggal_pengiriman" name="tgl_pengiriman">
                    </div>
                    <div class="form-group">
                        <label for="nomor_surat">Nomor Surat</label>
                        <input type="text" class="form-control" id="nomor_surat" name="no_surat" 
                        value="{{ isset($suratpengiriman) ? $suratpengiriman->no_surat : '' }}" readonly>
                    </div>  

                    <div class="form-group">
                        <label for="from">Dari</label>
                        <input type="text" class="form-control" id="from" name="dari" 
                            value="{{ isset($suratpengiriman) ? $suratpengiriman->dari : '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tertuju">Tujuan</label>
                        <input type="text" class="form-control" id="tertuju" name="tertuju" 
                            value="{{ isset($suratpengiriman) ? $suratpengiriman->tertuju : '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="perihal">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" 
                            value="{{ isset($suratpengiriman) ? $suratpengiriman->perihal : '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pengiriman">Jenis Pengiriman</label>
                        <select class="form-control" id="jenis_pengiriman" name="jenis_pengiriman">
                            <option value="pilih_jenis">--Pilih Jenis--</option>
                            <option value="ekspedisi">Ekspedisi</option>
                            <option value="lokasi">Lokasi</option>
                        </select>
                    </div>
                    
                    <div class="form-group" id="penerima_field">
                        <label for="penerima">Penerima</label>
                        <input type="text" class="form-control" id="penerima" name="penerima">
                    </div>
                    
                    <div class="form-group" id="ekspedisi_field" style="display:none;">
                        <label for="ekspedisi">Ekspedisi</label>
                        <select class="form-control" id="ekspedisi" name="ekspedisi">
                            <option value="JNE">JNE</option>
                            <option value="POST">POST</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="file">Bukti Foto</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a href="{{ route('listSuratKeluar') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>   
            </div>
 
        </div>
    </div>
</div> --}}
