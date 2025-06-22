<?php
// <!-- file lokasi : app/Livewire/Matakuliah/ShowMatakuliah.php -->

namespace App\Livewire\Matakuliah;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Matakuliah;
use App\Models\Prodi;

class ShowMatakuliah extends Component
{
    use WithPagination;
    
    protected $listeners = ['matakuliahUpdated' => '$refresh'];
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.matakuliah.show-matakuliah', [
            'matakuliahList' => Matakuliah::with('prodi')->latest()->paginate(7)
        ]);
    }

    public function edit($id)
    {
        $matakuliah = Matakuliah::find($id);
        $this->dispatch('editMatakuliah', $matakuliah);
    }

    public function destroy($id)
    {
        try {
            Matakuliah::find($id)->delete();
            session()->flash('message', 'Matakuliah berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus matakuliah: ' . $e->getMessage());
        }
    }
}