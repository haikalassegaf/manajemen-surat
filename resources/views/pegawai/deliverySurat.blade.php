@extends('layouts.main')

@section('title', 'Delivery Mails')

@section('contents')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Pengiriman Surat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis</th>
                            <th>Tanggal Dikirim</th>
                            <th>Penerima</th>
                            <th>Ekspedisi</th>
                            <th>Bukti Foto</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis</th>
                            <th>Tanggal Dikirim</th>
                            <th>Penerima</th>
                            <th>Ekspedisi</th>
                            <th>Bukti Foto</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($no = 1)
                        @foreach ($dataPengirimanSurat as $row)
                            @if ($row->pengirim == Auth::user()->name)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $row->no_surat }}</td>
                                    <td>{{ $row->jenis }}</td>
                                    <td>{{ $row->tgl_pengiriman }}</td>
                                    <td>{{ $row->penerima }}</td>
                                    <td>
                                        @if ($row->jenis_pengiriman == 'lokasi')
                                            -
                                        @else
                                            {{ $row->ekspedisi }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary"
                                            onclick="displayModal('{{ Storage::url($row->bukti_foto) }}')">Foto</a>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                        aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Gambar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img id="modalImage" src="" alt="Gambar" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Script JavaScript -->
                                    <script>
                                        function displayModal(imageUrl) {
                                            document.getElementById('modalImage').src = imageUrl;
                                            $('#imageModal').modal('show');
                                        }
                                    </script>
                                </tr>
                            @endif
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
