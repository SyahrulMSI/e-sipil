<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'service';

    protected $fillable = [
        'id',
        'id_user',
        'nomor_registrasi',
        'tanggal',
        'alamat',
        'jenis_service',
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

    public function JenisKerusakan()
    {
        return $this->hasMany(JenisKerusakan::class, 'id_service', 'id');
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_service', 'id');
    }
}
