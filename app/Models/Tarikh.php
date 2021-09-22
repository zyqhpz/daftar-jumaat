<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senarai extends Model
{
    use HasFactory;

    protected $table = 'tarikh';

    protected $fillable = [
        'tarikh',
        'tarikh_id',
    ];
}
