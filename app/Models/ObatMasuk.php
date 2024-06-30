<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    use HasFactory;


    protected $table = 'obat_masuk'; // Nama tabel yang digunakan

    protected $primaryKey = 'id_obat_masuk'; // Nama primary key yang digunakan

    protected $fillable = ['id_obat', 'nama_obat', 'jumlah_masuk', 'tanggal', 'biaya_pemesanan'];

    public $timestamps = false; // Nonaktifkan pengaturan timestamp otomatis

    // Relasi ke tabel obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}
