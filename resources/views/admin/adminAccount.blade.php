@extends('layouts.app')

@section('title', 'Admin Account')

@section('contents')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Admin</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('addadmin') }}" class="btn btn-info mb-3">Add Account</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Unit</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Unit</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php($no = 1)
                        @foreach ($dataAdmin as $row)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $row->nip }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->unit }}</td>
                                <td>{{ $row->no_telepon }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', $row->nip) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $row->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Konfirmasi Penghapusan -->
                            <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('admin.delete', $row->nip) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
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
