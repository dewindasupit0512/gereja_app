<?php

namespace App\Http\Livewire\Admin;

use App\Models\Peran;
use App\Models\Anggota;
use Livewire\Component;
use App\Models\PeranAnggota;

class TambahAnggota extends Component
{
    // Binding Variable
    public $nama_anggota;
    public $peran_anggota;

    protected $rules = [
        'nama_anggota' => 'required|string',
        'peran_anggota' => 'nullable',
    ];

    public function mount() {
        $this->nama_anggota = '';
        $this->peran_anggota = [];
    }

    public function render()
    {
        $peran = Peran::get();
        $anggota = Anggota::with('peran')->get();

        return view('livewire.admin.tambah-anggota', [
            'perans' => $peran,
            'anggotas' => $anggota,
        ])->layout('layouts.admin_app');
    }

    public function simpan_anggota() {
        $this->validate();

        $anggota = new Anggota;
        $anggota->nama = $this->nama_anggota;
        $anggota->save();

        if ($this->peran_anggota != null) {
            foreach ($this->peran_anggota as $peran_id) {
                $add_peran_anggota = new PeranAnggota;
                $add_peran_anggota->id_anggota = $anggota->id;
                $add_peran_anggota->id_peran = $peran_id;
                $add_peran_anggota->save();
            }
        }

        $this->nama_anggota = '';
        $this->peran_anggota = [];
    }

}
