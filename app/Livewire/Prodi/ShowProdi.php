<?php

namespace App\Livewire\Prodi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Prodi;

class ShowProdi extends Component
{
    use WithPagination;
    
    protected $listeners = ['prodiUpdated' => '$refresh'];
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.prodi.show-prodi', [
            'prodiList' => Prodi::with('fakultas')->latest()->paginate(5)
        ]);
    }

    public function edit($id)
    {
        $prodi = Prodi::with('fakultas')->find($id);
        $this->dispatch('editProdi', $prodi);
    }

    public function destroy($id)
    {
        try {
            Prodi::find($id)->delete();
            session()->flash('message', 'Program Studi berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus program studi: ' . $e->getMessage());
        }
    }
}