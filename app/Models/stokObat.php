<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokObat extends Model
{
    use HasFactory;

    protected $table = 'stok_obat'; // Nama tabel yang digunakan

    protected $fillable = ['nama', 'satuan', 'stok_awal', 'stok_akhir'];

    protected $primaryKey = 'id_stok_obat'; // Nama primary key yang digunakan

    public $timestamps = false; // Disable automatic timestamp management

    // public function obatKeluar()
    // {
    //     return $this->belongsTo(Obat::class, 'id_obat', 'id');
    // }
}
