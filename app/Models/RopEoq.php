<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RopEoq extends Model
{
    use HasFactory;

    protected $table = 'rop_eoq'; // Nama tabel yang digunakan

    protected $primaryKey = 'id_rop_eoq'; // Nama primary key yang digunakan

    protected $fillable = ['id_obat', 'nama_obat', 'rip', 'eoq']; // Kolom yang dapat diisi

    public $timestamps = false; // Nonaktifkan pengaturan timestamp otomatis

    // Relasi ke tabel obat
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}
