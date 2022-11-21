<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    use HasFactory, SoftDeletes;

    public $table  = 'detail_user';

    protected $fillable = [
        'id_user',
        'profile',
        'npwp',
        'jenis_kelamin',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'jenis_identitas',
        'no_identitas',
        'deleted_at',
        'created_at',
        'deleted_at'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'deleted_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class,  'id_user', 'id');
    }

}
