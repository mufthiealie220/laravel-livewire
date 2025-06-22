<?php

namespace App\Livewire\Fakultas;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fakultas;

class ShowFakultas extends Component
{
    use WithPagination;
    
    protected $listeners = ['fakultasUpdated' => '$refresh'];
    
    protected $paginationTheme = 'bootstrap'; // Gunakan tema bootstrap untuk pagination

    public function render()
    {
        return view('livewire.fakultas.show-fakultas', [
            'fakultasList' => Fakultas::latest()->paginate(5) // Paginate dengan 5 data per halaman
        ]);
    }

    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        $this->dispatch('editFakultas', $fakultas);
    }

    public function destroy($id)
    {
        try {
            Fakultas::find($id)->delete();
            session()->flash('message', 'Fakultas berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus fakultas: ' . $e->getMessage());
        }
    }
}