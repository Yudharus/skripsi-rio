<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat'; // Nama tabel yang digunakan

    protected $fillable = ['nama_obat', 'satuan_obat', 'harga_obat', 'stok', 'id_supplier','supplier', 'history'];

    protected $primaryKey = 'id_obat'; // Nama primary key yang digunakan

    public $timestamps = false; // Disable automatic timestamp management

    public function obatKeluar()
    {
        return $this->hasMany(ObatKeluar::class, 'id_obat', 'id');
    }
}
