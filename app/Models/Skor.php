<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenisKelamin',
        'alamat',
        'email',
        'noHp',
        'komunikasi',
        'kerjasama',
        'kejujuran',
        'interpersonal'
    ];
}
