@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Data Perhitungan menggunakan EOQ dan ROP</h2>
        <span>{{ date('d-m-Y') }}</span>
    </div>
    <div class="table-responsive table-striped">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Obat</th>
                    <!-- <th>Satuan Obat</th> -->
                    <th>Harga Obat</th>
                    <!-- <th>Stok</th> -->
                    <!-- <th>Jumlah Masuk</th> -->
                    <!-- <th>Biaya Pemesanan</th> -->
                    <!-- <th>Total Biaya Penyimpanan</th> -->
                    <th>Tanggal</th>
                    <th>Stok Akhir</th>
                    <th>Jumlah Beli</th>
                    <th>Titik Pesan</th>
                    <th>Penjualan Rata - Rata</th>
                    <th>Penjualan Maksimal</th>
                    <th>Lead Time</th>
                    <th>Safety Stock</th>
                </tr>
            </thead>
            <tbody id="dataObat">
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['nama_obat'] }}</td>
                        <!-- <td>{{ $item['satuan_obat'] }}</td> -->
                        <td>{{ $item['harga_obat'] }}</td>
                        <!-- <td>{{ $item['stok'] }}</td> -->
                        <!-- <td>{{ $item['jumlah_masuk'] }}</td> -->
                        <!-- <td>{{ $item['biaya_pemesanan'] }}</td> -->
                        <!-- <td>{{ $item['total_biaya_penyimpanan'] }}</td> -->
                        <td>{{ $item['tanggal'] }}</td>
                        <td>{{ $item['stock_akhir'] }}</td>
                        <td>{{ $item['eoq'] }}</td>
                        <td>{{ $item['rop'] }}</td>
                        <td>{{ $item['rata_rata'] }}</td>
                        <td>{{ $item['penjualan_maksimal'] }}</td>
                        <td>1</td>
                        <td>{{ $item['safety_stock'] }}</td>
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
