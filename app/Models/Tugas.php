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
}
