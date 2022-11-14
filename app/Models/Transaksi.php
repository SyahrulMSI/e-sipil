<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'transaksi';

    protected $fillablbe = [
        'id_user',
        'id_tambah_daya',
        'id_pemasangan_baru',
        'id_instalasi',
        'id_service',
        'dp',
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
        $this->belongsTo(User::class, 'id_user', 'id');
    }


    public function TambahDaya()
    {
        $this->belongsTo(TambahDaya::class, 'id_tambah_daya', 'id');
    }

    public function PemasanganBaru()
    {
        return $this->belongsTo(PemasanganBaru::class, 'id_pemasangan_baru', 'id');
    }

    public function InstalasiBangunan()
    {
        return $this->belongsTo(InstalasiBangunan::class, 'id_instalsi', 'id');
    }
}
