@extends('layouts.app')

@section('title', 'Verification Mails')

@section('contents')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Surat Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis</th>
                            <th>Tanggal Input</th>
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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($no = 1)
                        @foreach ($verifSuratKeluar as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->no_surat }}</td>
                                <td>{{ $row->jenis }}</td>
                                <td>{{ $row->tgl_input_surat }}</td>
                                <td>
                                    @if ($row->status == '0')
                                        Menunggu
                                    @else
                                        Terverifikasi
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == 0)
                                        <button data-toggle="modal" data-target="#verifSuratKeluarModal{{ $row->no_surat }}"
                                            class="btn btn-success">Verifikasi</button>
                                    @else
                                        
                                    @endif
                                </td>
                            </tr>
                            <div class="modal fade" id="verifSuratKeluarModal{{ $row->no_surat }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Verifikasi Surat
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
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('suratkeluar.verif', $row->no_surat) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Verifikasi</button>
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
