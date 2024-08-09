@extends('layouts.app')

@section('content')
<div class="container mt-4">
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
        <h2>Data Stok Obat</h2>
        <div class="table-responsive table-striped">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Obat</th>
                        <th>Satuan Obat</th>
                        <th>Stok Awal</th>
                        <th>Stok AKhir</th>
                    </tr>
                </thead>
                <tbody id="dataObat">
                    @foreach ($obats as $obat)
                        <tr>
                            <td>{{ $obat->nama_obat }}</td>
                            <td>{{ $obat->satuan_obat }}</td>
                            <td>{{ $obat->stok }}</td>
                            <td>{{ $obat->stok_akhir }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection