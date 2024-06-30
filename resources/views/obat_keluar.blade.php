@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Obat Keluar</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahObatKeluarModal">Tambah Obat Masuk</button>
    <div class="table-responsive table-striped">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Obat</th>
                    <th>Jumlah Keluar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat_keluars as $obat_keluar)
                <tr>
                    <td>{{ $obat_keluar->nama_obat }}</td>
                    <td>{{ $obat_keluar->jumlah_keluar }}</td>
                    <td>{{ $obat_keluar->tanggal }}</td> <!-- Pastikan mengakses kolom tanggal dengan nama yang sesuai -->
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editObatKeluarModal{{ $obat_keluar->id_obat_keluar }}">Edit</button>
                        <form action="{{ route('obat_keluar.destroy', $obat_keluar->id_obat_keluar) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Obat Masuk -->
<div class="modal fade" id="tambahObatKeluarModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatKeluarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahObatKeluarModalLabel">Tambah Obat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('obat_keluar.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="idObat">ID Obat</label>
                        <select class="form-control" id="idObat" name="id_obat">
                            @foreach ($obats as $obat)
                            <option value="{{ $obat->id_obat }}">{{ $obat->nama_obat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlahKeluar">Jumlah keluar</label>
                        <input type="number" class="form-control" id="jumlahKeluar" name="jumlah_keluar" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required> <!-- Pastikan nama input sesuai -->
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($obat_keluars as $obat_keluar)
<!-- Modal Edit Obat Masuk -->
<div class="modal fade" id="editObatKeluarModal{{ $obat_keluar->id_obat_keluar }}" tabindex="-1" role="dialog" aria-labelledby="editObatKeluarModalLabel{{ $obat_keluar->id_obat_keluar }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editObatKeluarModalLabel{{ $obat_keluar->id_obat_keluar }}">Edit Data Obat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('obat_keluar.update', $obat_keluar->id_obat_keluar) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idObatEdit">ID Obat</label>
                        <select class="form-control" id="idObatEdit" name="id_obat">
                            @foreach ($obats as $obat)
                            <option value="{{ $obat->id_obat }}" @if ($obat->id_obat == $obat_keluar->id_obat) selected @endif>{{ $obat->nama_obat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlahKeluarEdit">Jumlah Masuk</label>
                        <input type="number" class="form-control" id="jumlahKeluarEdit" name="jumlah_keluar" value="{{ $obat_keluar->jumlah_keluar }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggalEdit">Tanggal</label>
                        <input type="date" class="form-control" id="tanggalEdit" name="tanggal" value="{{ $obat_keluar->tanggal }}" required> <!-- Pastikan nama input sesuai -->
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
