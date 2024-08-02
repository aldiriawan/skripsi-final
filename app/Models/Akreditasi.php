<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akreditasi extends Model
{
    use HasFactory;
    protected $table = 'akreditasi';
    protected $guarded = [
        'id'
    ];
    public function surattugas()
    {
        return $this->hasMany(SuratTugas::class);
    }
    public function publikasi()
    {
        return $this->hasMany(SuratTugas::class);
    }
}
