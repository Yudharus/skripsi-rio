@extends('layouts.app')

@section('content')
<div class="container mt-4">
        <h2>Data Obat</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahObatModal">Tambah Obat</button>
        <div class="table-responsive table-striped">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th>ID Obat</th> -->
                        <th>Tanggal</th>
                        <th>Nama Obat</th>
                        <th>Satuan Obat</th>
                        <!-- <th>Harga Obat</th> -->
                        <th>Stok Awal</th>
                        <th>Jumlah Jual</th>
                        <th>Supplier</th>
                        <th>Stok Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataObat">
                    @foreach ($obats as $obat)
                        <tr>
                            <!-- <td>{{ $obat->id_obat }}</td> -->
                            <td>{{ $obat->history }}</td>
                            <td>{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->satuan_obat }}</td>
                            <!-- <td>{{ $obat->harga_obat }}</td> -->
                            <td>{{ $obat->stok }}</td>
                            <td>{{ $obat->jumlah_keluar }}</td>
                            <td>{{ $obat->supplier }}</td>
                            <td>{{ $obat->stok }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editObatModal{{ $obat->id_obat }}">Edit</button>
                                <form action="{{ route('obat.destroy', $obat->id_obat) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Obat -->
                        <div class="modal fade" id="editObatModal{{ $obat->id_obat }}" tabindex="-1" role="dialog" aria-labelledby="editObatModalLabel{{ $obat->id_obat }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editObatModalLabel{{ $obat->id_obat }}">Edit Data Obat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditObat{{ $obat->id_obat }}" method="POST" action="{{ route('obat.update', $obat->id_obat) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                            <label for="idSupplier{{ $obat->id_obat }}">Supplier</label>
                                            <select class="form-control" id="idSupplier{{ $obat->id_obat }}" name="id_supplier" required>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id_supplier }}" {{ $supplier->id_supplier == $obat->id_supplier ? 'selected' : '' }}>{{ $supplier->nama_supplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                            <div class="form-group">
                                                <label for="namaObat{{ $obat->id_obat }}">Nama Obat</label>
                                                <input type="text" class="form-control" id="namaObat{{ $obat->id_obat }}" name="nama_obat" value="{{ $obat->nama_obat }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="satuanObat{{ $obat->id_obat }}">Satuan Obat</label>
                                                <input type="text" class="form-control" id="satuanObat{{ $obat->id_obat }}" name="satuan_obat" value="{{ $obat->satuan_obat }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="hargaObat{{ $obat->id_obat }}">Harga Obat</label>
                                                <input type="number" class="form-control" id="hargaObat{{ $obat->id_obat }}" name="harga_obat" value="{{ $obat->harga_obat }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="stokObat{{ $obat->id_obat }}">Stok</label>
                                                <input type="number" class="form-control" id="stokObat{{ $obat->id_obat }}" name="stok" value="{{ $obat->stok }}" required>
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
    <div class="modal fade" id="tambahObatModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahObatModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTambahObat" method="POST" action="{{ route('obat.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="idSupplier">Supplier</label>
                            <select class="form-control" id="idSupplier" name="id_supplier" required>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id_supplier }}">{{ $supplier->nama_supplier }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="namaObat">Nama Obat</label>
                            <input type="text" class="form-control" id="namaObat" name="nama_obat" required>
                        </div>
                        <div class="form-group">
                            <label for="satuanObat">Satuan Obat</label>
                            <input type="text" class="form-control" id="satuanObat" name="satuan_obat" required>
                        </div>
                        <div class="form-group">
                            <label for="hargaObat">Harga Obat</label>
                            <input type="number" class="form-control" id="hargaObat" name="harga_obat" required>
                        </div>
                        <div class="form-group">
                            <label for="stokObat">Stok</label>
                            <input type="number" class="form-control" id="stokObat" name="stok" required>
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