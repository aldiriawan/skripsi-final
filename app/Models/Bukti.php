<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    use HasFactory;
    protected $table = 'bukti';
    protected $guarded = [
        'id'
    ];
    public function surattugas()
    {
        return $this->hasMany(SuratTugas::class);
    }
}
