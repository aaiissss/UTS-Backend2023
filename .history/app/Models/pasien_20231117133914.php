<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    # menambahkan property fillable
    protected $fillable = ['name', 'phone', 'addres', 'in_date_at', ];
}
