<?php
// lokasi: app/Models/Matakuliah.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';

    protected $fillable = [
        'kode',
        'nama_matakuliah',
        'sks',
        'prodi_id',
        'semester',
    ];

    /**
     * Relasi ke tabel prodi (setiap matakuliah milik satu prodi).
     */
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}
