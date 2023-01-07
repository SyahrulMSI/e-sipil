<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RincianPelunasan extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'rincian_pelunasan';

    protected $fillable = [
        'id_user',
        'id_transaksi',
        'rincian',
        'nominal_tagihan',
        'nominal_dp',
        'nominal_pelunasan',
        'deleted_at',
        'created_at',
        'updateda_at'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updateda_at'
    ];

    public function Transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_trasaksi', 'id');
    }
}
