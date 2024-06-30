@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Obat Masuk</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahObatMasukModal">Tambah Obat Masuk</button>
    <div class="table-responsive table-striped">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Obat</th>
                    <th>Jumlah Masuk</th>
                    <th>Tanggal</th>
                    <th>Biaya Pemesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat_masuks as $obat_masuk)
                <tr>
                    <td>{{ $obat_masuk->nama_obat }}</td>
                    <td>{{ $obat_masuk->jumlah_masuk }}</td>
                    <td>{{ $obat_masuk->tanggal }}</td> <!-- Pastikan mengakses kolom tanggal dengan nama yang sesuai -->
                    <td>{{ $obat_masuk->biaya_pemesanan }}</td> <!-- Pastikan mengakses kolom tanggal dengan nama yang sesuai -->
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editObatMasukModal{{ $obat_masuk->id_obat_masuk }}">Edit</button>
                        <form action="{{ route('obat_masuk.destroy', $obat_masuk->id_obat_masuk) }}" method="POST" style="display:inline-block;">
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
<div class="modal fade" id="tambahObatMasukModal" tabindex="-1" role="dialog" aria-labelledby="tambahObatMasukModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahObatMasukModalLabel">Tambah Obat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('obat_masuk.store') }}">
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
                        <label for="jumlahMasuk">Jumlah Masuk</label>
                        <input type="number" class="form-control" id="jumlahMasuk" name="jumlah_masuk" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required> <!-- Pastikan nama input sesuai -->
                    </div>
                    <div class="form-group">
                        <label for="biayaPemesanan">Biaya Pemesanan</label>
                        <input type="number" class="form-control" id="biayaPemesanan" name="biaya_pemesanan" required> <!-- Pastikan nama input sesuai -->
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($obat_masuks as $obat_masuk)
<!-- Modal Edit Obat Masuk -->
<div class="modal fade" id="editObatMasukModal{{ $obat_masuk->id_obat_masuk }}" tabindex="-1" role="dialog" aria-labelledby="editObatMasukModalLabel{{ $obat_masuk->id_obat_masuk }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editObatMasukModalLabel{{ $obat_masuk->id_obat_masuk }}">Edit Data Obat Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('obat_masuk.update', $obat_masuk->id_obat_masuk) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="idObatEdit">ID Obat</label>
                        <select class="form-control" id="idObatEdit" name="id_obat">
                            @foreach ($obats as $obat)
                            <option value="{{ $obat->id_obat }}" @if ($obat->id_obat == $obat_masuk->id_obat) selected @endif>{{ $obat->nama_obat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlahMasukEdit">Jumlah Masuk</label>
                        <input type="number" class="form-control" id="jumlahMasukEdit" name="jumlah_masuk" value="{{ $obat_masuk->jumlah_masuk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggalEdit">Tanggal</label>
                        <input type="date" class="form-control" id="tanggalEdit" name="tanggal" value="{{ $obat_masuk->tanggal }}" required> <!-- Pastikan nama input sesuai -->
                    </div>
                    <div class="form-group">
                        <label for="biayaPemesananEdit">Biaya Pemesanan</label>
                        <input type="number" class="form-control" id="biayaPemesananEdit" name="biaya_pemesanan" value="{{ $obat_masuk->biaya_pemesanan }}" required> <!-- Pastikan nama input sesuai -->
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
