<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenisKelamin',
        'alamat',
        'email',
        'noHp',
    ];

    public function skors()
    {
        return $this->hasOne(Skor::class, 'idKandidat', 'id');
    }
}
