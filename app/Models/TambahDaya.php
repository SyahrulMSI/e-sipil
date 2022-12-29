<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TambahDaya extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'tambah_daya';

    protected $fillable = [
        'id_user',
        'nomor_registrasi',
        'tanggal',
        'tarif_lama',
        'tarif_baru',
        'daya_lama',
        'daya_baru',
        'lokasi_meter',
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
        return $this->hasMany(Transaksi::class, 'id_tambah_daya', 'id');
    }

    public function Tugas()
    {
        return $this->hasMany(Tugas::class, 'id_tambah_daya', 'id');
    }

}
