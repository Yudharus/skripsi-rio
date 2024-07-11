<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suplier'; // Nama tabel yang digunakan

    protected $fillable = ['nama_supplier', 'alamat', 'telepon'];

    protected $primaryKey = 'id_supplier'; // Nama primary key yang digunakan

    public $timestamps = false; // Disable automatic timestamp management

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id_obat');
    }
}
