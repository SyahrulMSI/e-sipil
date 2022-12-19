<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tugas extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'tugas';

    protected $fillable = [
        'id_pelanggan',
        'id_petugas',
        'id_tambah_daya',
        'id_pemasangan_baru',
        'id_instalasi',
        'id_service',
        'status',
        'description',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function Petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas', 'id');
    }

    public function Pelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan', 'id');
    }

    public function TambahDaya()
    {
        return $this->belongsTo(TambahDaya::class, 'id_tambah_daya', 'id');
    }

    public function PemasanganBaru()
    {
        return $this->belongsTo(PemasanganBaru::class, 'id_pemasangan_baru', 'id');
    }

    public function Instalasi()
    {
        return $this->belongsTo(InstalasiBangunan::class, 'id_instalasi', 'id');
    }

    public function Service()
    {
        return $this->belongsTo(Service::class, 'id_service', 'id');
    }

}
