<?php

namespace App\Livewire\Matakuliah;

use Livewire\Component;
use App\Models\Matakuliah;
use App\Models\Prodi;

class CreateMatakuliah extends Component
{
    public $kode;
    public $nama_matakuliah;
    public $sks;
    public $prodi_id;
    public $semester;
    public $matakuliah_id;
    public $isEdit = false;

    protected $listeners = ['editMatakuliah' => 'setMatakuliah'];

    public function render()
    {
        return view('livewire.matakuliah.create-matakuliah', [
            'prodis' => Prodi::all()
        ]);
    }

    public function setMatakuliah($matakuliah)
    {
        $this->matakuliah_id = $matakuliah['id'];
        $this->kode = $matakuliah['kode'];
        $this->nama_matakuliah = $matakuliah['nama_matakuliah'];
        $this->sks = $matakuliah['sks'];
        $this->prodi_id = $matakuliah['prodi_id'];
        $this->semester = $matakuliah['semester'];
        $this->isEdit = true;
    }

    public function store()
    {
        $this->validate([
            'kode' => 'required|string|max:10|unique:matakuliah,kode',
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'prodi_id' => 'required|exists:prodi,id',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        Matakuliah::create([
            'kode' => $this->kode,
            'nama_matakuliah' => $this->nama_matakuliah,
            'sks' => $this->sks,
            'prodi_id' => $this->prodi_id,
            'semester' => $this->semester,
        ]);

        $this->reset();
        $this->dispatch('matakuliahUpdated');
        session()->flash('message', 'Matakuliah berhasil ditambahkan.');
    }

    public function update()
    {
        $this->validate([
            'kode' => 'required|string|max:10|unique:matakuliah,kode,'.$this->matakuliah_id,
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'prodi_id' => 'required|exists:prodi,id',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        $matakuliah = Matakuliah::find($this->matakuliah_id);
        $matakuliah->update([
            'kode' => $this->kode,
            'nama_matakuliah' => $this->nama_matakuliah,
            'sks' => $this->sks,
            'prodi_id' => $this->prodi_id,
            'semester' => $this->semester,
        ]);

        $this->reset();
        $this->dispatch('matakuliahUpdated');
        session()->flash('message', 'Matakuliah berhasil diupdate.');
    }

    public function resetInput()
    {
        $this->reset();
    }
}