<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKerusakan extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'jenis_kerusakan';

    protected $fillable = [
        'id',
        'id_service',
        'kerusakan',
        'deskripsi',
        'deleted_at',
        'created_at',
        'udpated_at'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'udpated_at'
    ];

    public function Service()
    {
        return $this->belongsTo(Service::class, 'id_service', 'id');
    }
}
