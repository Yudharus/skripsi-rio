<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    use HasFactory;

    
    protected $table = 'obat_keluar'; // Nama tabel yang digunakan

    protected $primaryKey = 'id_obat_keluar'; // Nama primary key yang digunakan

    protected $fillable = ['id_obat', 'nama_obat', 'jumlah_keluar', 'tanggal'];

    public $timestamps = false; // Nonaktifkan pengaturan timestamp otomatis

    // Relasi ke tabel obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}
