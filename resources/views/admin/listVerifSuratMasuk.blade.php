@extends('layouts.app')

@section('title', 'Verification Mails')

@section('contents')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Surat Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis</th>
                            <th>Tanggal Surat Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis</th>
                            <th>Tanggal Surat Masuk</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($no = 1)
                        @foreach ($verifSuratMasuk as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->no_surat }}</td>
                                <td>{{ $row->jenis }}</td>
                                <td>{{ $row->tgl_surat_masuk }}</td>
                                <td>
                                    @if ($row->status == '0')
                                        Diterima
                                    @else
                                        Tertolak
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == 0)
                                        <button data-toggle="modal" data-target="#verifSuratMasukModal{{ $row->no_surat }}"
                                            class="btn btn-danger">Tolak Surat</button>
                                    @else
                                        <!-- Tampilkan sesuatu jika status surat bukan 0, atau Anda bisa meninggalkan bagian ini kosong -->
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="verifSuratMasukModal{{ $row->no_surat }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Verifikasi Surat
                                                Masuk</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Tanggal Surat Masuk:</strong> {{ $row->tgl_surat_masuk }}</p>
                                            <p><strong>Nomor Surat:</strong> {{ $row->no_surat }}</p>
                                            <p><strong>Jenis:</strong> {{ $row->jenis }}</p>
                                            <p><strong>Perihal:</strong> {{ $row->perihal }}</p>
                                            <p><strong>Penerima:</strong> {{ $row->penerima }}</p>
                                            <p><strong>Dari:</strong> {{ $row->dari }}</p>
                                            <p><strong>Tertuju:</strong> {{ $row->tertuju }}</p>
                                            <p><strong>Tanggal Pembuatan:</strong> {{ $row->tgl_pembuatan }}</p>
                                            <form action="{{ route('suratmasuk.verif', $row->no_surat) }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan:</label>
                                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4"
                                                        placeholder="Tambahkan keterangan di sini"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                            </form>
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
