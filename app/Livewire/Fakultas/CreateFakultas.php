<?php

namespace App\Livewire\Fakultas;

use Livewire\Component;
use App\Models\Fakultas;

class CreateFakultas extends Component
{
    public $nama_fakultas;
    public $fakultas_id;
    public $isEdit = false;

    protected $listeners = ['editFakultas' => 'setFakultas'];

    public function render()
    {
        return view('livewire.fakultas.create-fakultas');
    }

    public function setFakultas($fakultas)
    {
        $this->fakultas_id = $fakultas['id'];
        $this->nama_fakultas = $fakultas['nama_fakultas'];
        $this->isEdit = true;
    }

    public function store()
    {
        $this->validate([
            'nama_fakultas' => 'required|string|max:255|unique:fakultas,nama_fakultas',
        ]);

        Fakultas::create([
            'nama_fakultas' => $this->nama_fakultas,
        ]);

        $this->reset();
        $this->dispatch('fakultasUpdated');
        session()->flash('message', 'Fakultas berhasil ditambahkan.');
    }

    public function update()
    {
        $this->validate([
            'nama_fakultas' => 'required|string|max:255|unique:fakultas,nama_fakultas,'.$this->fakultas_id,
        ]);

        $fakultas = Fakultas::find($this->fakultas_id);
        $fakultas->update([
            'nama_fakultas' => $this->nama_fakultas
        ]);

        $this->reset();
        $this->dispatch('fakultasUpdated');
        session()->flash('message', 'Fakultas berhasil diupdate.');
    }

    public function resetInput()
    {
        $this->reset();
    }
}