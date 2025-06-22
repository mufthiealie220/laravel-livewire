<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';

    protected $fillable = [
        'mahasiswa_id',
        'matakuliah_id',
    ];

    /**
     * Relasi ke Mahasiswa (setiap KRS milik satu mahasiswa).
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    /**
     * Relasi ke Matakuliah (setiap KRS memiliki satu matakuliah).
     */
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
}
