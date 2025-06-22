<?php
namespace App\Livewire\Krs;

use Livewire\Component;
use App\Models\Krs;
use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class KrsComponent extends Component
{
    public $matakuliahDipilih = [];
    public $totalSKS = 0;
    public $matakuliahTersedia = [];
    public $mahasiswa;

    public function mount()
    {
        // Pastikan user sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $this->mahasiswa = $user->mahasiswa;
            
            if ($this->mahasiswa) {
                // Ambil matakuliah yang tersedia untuk prodi mahasiswa
                $this->matakuliahTersedia = Matakuliah::where('prodi_id', $this->mahasiswa->prodi_id)
                    ->orderBy('semester')
                    ->orderBy('nama_matakuliah')
                    ->get();
                
                // Hitung total SKS yang sudah diambil
                $this->hitungTotalSKS();
            }
        }
    }

    public function hitungTotalSKS()
    {
        $this->totalSKS = $this->mahasiswa->krs()
            ->with('matakuliah')
            ->get()
            ->sum(function($krs) {
                return $krs->matakuliah->sks;
            });
    }

    public function ambilKRS()
    {
        // Validasi
        $this->validate([
            'matakuliahDipilih' => 'required|array',
            'matakuliahDipilih.*' => 'exists:matakuliah,id',
        ]);

        // Hitung total SKS yang akan diambil
        $sksDitambahkan = Matakuliah::whereIn('id', $this->matakuliahDipilih)
            ->sum('sks');
        
        $totalSKSBaru = $this->totalSKS + $sksDitambahkan;

        // Validasi maksimum SKS
        if ($totalSKSBaru > 24 && $totalSKSBaru >= 24) {
            session()->flash('error', 'Total SKS tidak boleh melebihi 24');
            return;
        }
        

        // Simpan KRS
        foreach ($this->matakuliahDipilih as $matakuliahId) {
            Krs::create([
                'mahasiswa_id' => $this->mahasiswa->id,
                'matakuliah_id' => $matakuliahId
            ]);
        }

        // Reset form
        $this->matakuliahDipilih = [];
        $this->hitungTotalSKS();
        
        session()->flash('success', 'KRS berhasil disimpan');
    }

    public function batalkanKRS($krsId)
    {
        $krs = Krs::find($krsId);
        
        if ($krs && $krs->mahasiswa_id == $this->mahasiswa->id) {
            $krs->delete();
            $this->hitungTotalSKS();
            session()->flash('success', 'Mata kuliah berhasil dibatalkan');
        } else {
            session()->flash('error', 'Gagal membatalkan mata kuliah');
        }
    }

    public function render()
    {
        $daftarKRS = [];
        
        if ($this->mahasiswa) {
            $daftarKRS = $this->mahasiswa->krs()
                ->with('matakuliah')
                ->get();
        }

        return view('livewire.krs.krs', [
            'daftarKRS' => $daftarKRS
        ]);
    }
}