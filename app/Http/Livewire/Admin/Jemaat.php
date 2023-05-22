<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jemaat as JemaatModel;
use Livewire\Component;

class Jemaat extends Component
{
    // Binding Variable
    public $nama;
    public $keluarga;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $status;
    public $rayon;

    protected $rules = [
        'nama' => 'required|string',
        'keluarga' => 'required|string',
        'tanggal_lahir' => 'required|date',
    ];

    public function mount() {
        $this->nama = null;
        $this->keluarga = null;
        $this->tanggal_lahir = null;
        $this->jenis_kelamin = null;
        $this->status = null;
        $this->rayon = null;
    }

    public function render()
    {
        $jemaat = JemaatModel::get();

        return view('livewire.admin.jemaat', ['jemaats' => $jemaat])->layout('layouts.admin_app');
    }
    
    public function add_jemaat() {
        $this->validate();
        
        $jemaat = new JemaatModel;
        $jemaat->nama = $this->nama;
        $jemaat->keluarga = $this->keluarga;
        $jemaat->tanggal_lahir = $this->tanggal_lahir;
        $jemaat->jenis_kelamin = $this->jenis_kelamin;
        $jemaat->status = $this->status;
        $jemaat->rayon = $this->rayon;
        $jemaat->save();

        $this->nama = null;
        $this->keluarga = null;
        $this->tanggal_lahir = null;
        $this->jenis_kelamin = null;
        $this->status = null;
        $this->rayon = null;
    }

}
