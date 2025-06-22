<?php
// app/Livewire/Mahasiswa/ShowMahasiswa.php
namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mahasiswa;
use App\Models\Fakultas;

class ShowMahasiswa extends Component
{
    use WithPagination;

    public $fakultasFilter = '';
    public $semesterFilter = '';

    public function render()
    {
        $query = Mahasiswa::with(['user', 'prodi.fakultas', 'krs.matakuliah'])
            ->when($this->fakultasFilter, function ($query) {
                $query->whereHas('prodi.fakultas', function ($q) {
                    $q->where('id', $this->fakultasFilter);
                });
            })
            ->when($this->semesterFilter, function ($query) {
                $query->whereHas('krs.matakuliah', function ($q) {
                    $q->where('semester', $this->semesterFilter);
                });
            });

        $mahasiswas = $query->paginate(10);

        // Calculate total SKS for each student
        $mahasiswas->each(function ($mahasiswa) {
            $mahasiswa->total_sks = $mahasiswa->krs->sum(function ($krs) {
                return $krs->matakuliah->sks ?? 0;
            });
        });

        $fakultas = Fakultas::all();
        $semesters = range(1, 8); // Assuming 8 semesters

        return view('livewire.mahasiswa.show-mahasiswa', [
            'mahasiswas' => $mahasiswas,
            'fakultas' => $fakultas,
            'semesters' => $semesters,
        ]);
    }
}
?>