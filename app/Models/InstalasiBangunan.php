<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstalasiBangunan extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'instalasi';

    protected $fillable = [
        'id_user',
        'nomor_registrasi',
        'tanggal',
        'alamat',
        'penetapan_harga_per_titik',
        'jumlah_titik',
        'status_permohonan',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'tanggal',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_instalasi', 'id');
    }
}
