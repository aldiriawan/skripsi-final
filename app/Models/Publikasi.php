<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    use HasFactory;

    protected $table = 'publikasi';

    protected $guarded = [
        'id'
    ];

    public function surattugas()
    {
        return $this->hasMany(SuratTugas::class);
    }

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }
}
