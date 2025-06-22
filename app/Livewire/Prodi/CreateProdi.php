<?php

namespace App\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use App\Models\Fakultas;

class CreateProdi extends Component
{
    public $nama_prodi;
    public $fakultas_id;
    public $prodi_id;
    public $isEdit = false;

    protected $listeners = ['editProdi' => 'setProdi'];

    public function render()
    {
        $fakultas = Fakultas::all();
        return view('livewire.prodi.create-prodi', compact('fakultas'));
    }

    public function setProdi($prodi)
    {
        $this->prodi_id = $prodi['id'];
        $this->nama_prodi = $prodi['nama_prodi'];
        $this->fakultas_id = $prodi['fakultas_id'];
        $this->isEdit = true;
    }

    public function store()
    {
        $this->validate([
            'nama_prodi' => 'required|string|max:255|unique:prodi,nama_prodi',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        Prodi::create([
            'nama_prodi' => $this->nama_prodi,
            'fakultas_id' => $this->fakultas_id,
        ]);

        $this->reset();
        $this->dispatch('prodiUpdated');
        session()->flash('message', 'Program Studi berhasil ditambahkan.');
    }

    public function update()
    {
        $this->validate([
            'nama_prodi' => 'required|string|max:255|unique:prodi,nama_prodi,'.$this->prodi_id,
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        $prodi = Prodi::find($this->prodi_id);
        $prodi->update([
            'nama_prodi' => $this->nama_prodi,
            'fakultas_id' => $this->fakultas_id
        ]);

        $this->reset();
        $this->dispatch('prodiUpdated');
        session()->flash('message', 'Program Studi berhasil diupdate.');
    }

    public function resetInput()
    {
        $this->reset();
    }
}