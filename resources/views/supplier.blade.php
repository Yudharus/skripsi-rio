@extends('layouts.app')

@section('content')
<div class="container mt-4">
        <h2>Data Supplier</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahSupplierModal">Tambah Supplier</button>
        <div class="table-responsive table-striped">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>ID Obat</th> -->
                        <th>Nama Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataSupplier">
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->nama_supplier }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSupplierModal{{ $supplier->id_supplier }}">Edit</button>
                                <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Obat -->
                        <div class="modal fade" id="editSupplierModal{{ $supplier->id_supplier }}" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel{{ $supplier->id_supplier }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSupplierModalLabel{{ $supplier->id_supplier }}">Edit Data supplier</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditSupplier{{ $supplier->id_supplier }}" method="POST" action="{{ route('supplier.update', $supplier->id_supplier) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="namaSupplier{{ $supplier->id_supplier }}">Nama supplier</label>
                                                <input type="text" class="form-control" id="namaSupplier{{ $supplier->id_supplier }}" name="nama_supplier" value="{{ $supplier->nama_supplier }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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

    <!-- Modal Tambah Obat -->
    <div class="modal fade" id="tambahSupplierModal" tabindex="-1" role="dialog" aria-labelledby="tambahSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSupplierModalLabel">Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTambahSupplier" method="POST" action="{{ route('supplier.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="namaSupplier">Nama Supplier</label>
                            <input type="text" class="form-control" id="namaSupplier" name="nama_supplier" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection