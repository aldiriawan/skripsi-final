<?php
namespace App\Models;
use App\Models\Bukti;
use App\Models\Dosen;
use App\Models\Jenis;
use App\Models\Peran;
use App\Models\Kategori;
use App\Models\Publikasi;
use App\Models\Akreditasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratTugas extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function peran()
    {
        return $this->belongsTo(Peran::class, 'peran_id');
    }
    public function publikasi()
    {
        return $this->belongsTo(Publikasi::class, 'publikasi_id');
    }
    public function bukti()
    {
        return $this->belongsTo(Bukti::class, 'bukti_id');
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
    public function akreditasi()
    {
        return $this->belongsTo(Akreditasi::class, 'akreditasi_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
