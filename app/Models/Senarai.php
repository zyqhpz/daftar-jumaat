<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senarai extends Model
{
    use HasFactory;

    protected $table = 'senarai_nama';

    protected $fillable = [
        'phone_id',
        'tarikh',
        'status_pendaftaran',
        'status_kehadiran'
    ];
}
