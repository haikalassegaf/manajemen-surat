@extends('layouts.main')

@section('title', 'Outgoing Mails')

@section('contents')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Surat Keluar</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('buat.suratkeluar') }}" class="btn btn-info mb-3">Add Mail</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis</th>
                            <th>Tanggal Input</th>
                            <th>Dari</th>
                            <th>Perihal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis</th>
                            <th>Tanggal Input</th>
                            <th>Dari</th>
                            <th>Perihal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($no = 1)
                        @foreach ($dataSuratKeluar as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->no_surat }}</td>
                                <td>{{ $row->jenis }}</td>
                                <td>{{ $row->tgl_input_surat }}</td>
                                <td>{{ $row->dari }}</td>
                                <td>{{ $row->perihal }}</td>
                                <td>
                                    @if ($row->status == '0')
                                        Proses
                                    @else
                                        Terkirim
                                    @endif
                                </td>
                                <td>
                                    <a href="" data-toggle="modal"
                                        data-target="#detailSuratKeluarModal{{ $row->no_surat }}" class="btn btn-secondary">
                                        <i class="fas fa-file-invoice"></i></a>
                                    @if ($row->status == 0)
                                        <a href="{{ route('buatPengiriman', $row->no_surat) }}" class="btn btn-primary">
                                            <i class="fas fa-paper-plane"></i>
                                        </a>
                                    @else
                                    @endif
                                    <a href="{{ route('ubah.SuratKeluar', $row->no_surat) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i></a>
                                    @if ($row->status != 2)
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteModal{{ $row->no_surat }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal{{ $row->no_surat }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <!-- Form Penghapusan dengan Method DELETE -->
                                            <form action="{{ route('pegawai.deletesuratkeluar', $row->no_surat) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="detailSuratKeluarModal{{ $row->no_surat }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Detail Surat
                                                Keluar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Tanggal Input Surat:</strong> {{ $row->tgl_input_surat }}</p>
                                            <p><strong>Nomor Surat:</strong> {{ $row->no_surat }}</p>
                                            <p><strong>Jenis:</strong> {{ $row->jenis }}</p>
                                            <p><strong>Perihal:</strong> {{ $row->perihal }}</p>
                                            <p><strong>Pengirim:</strong> {{ $row->pengirim }}</p>
                                            <p><strong>Dari:</strong> {{ $row->dari }}</p>
                                            <p><strong>Tertuju:</strong> {{ $row->tertuju }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table.table-bordered th,
        .table.table-bordered td {
            text-align: center;
        }
    </style>
@endsection
