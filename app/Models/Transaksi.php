<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transaksi';

    protected $fillable = [
        'id_user',
        'id_tambah_daya',
        'id_pemasangan_baru',
        'id_instalasi',
        'id_service',
        'total_bayar',
        'type_pembayaran',
        'url_midtrans',
        'status',
        'tanggal_transaksi',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }


    public function TambahDaya()
    {
        return $this->belongsTo(TambahDaya::class, 'id_tambah_daya', 'id');
    }

    public function PemasanganBaru()
    {
        return $this->belongsTo(PemasanganBaru::class, 'id_pemasangan_baru', 'id');
    }

    public function InstalasiBangunan()
    {
        return $this->belongsTo(InstalasiBangunan::class, 'id_instalasi', 'id');
    }

    public function Service()
    {
        return $this->belongsTo(Service::class, 'id_service', 'id');
    }

    public function RincianPelunasan()
    {
        return $this->hasMany(RincianPelunasan::class, 'id_transaksi', 'id');
    }

    public function Tugas()
    {
        return $this->hasMany(Tugas::class, 'id_transaksi', 'id');
    }
}
