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

    public $edit_id;
    public $edit_nama;
    public $edit_keluarga;
    public $edit_tanggal_lahir;
    public $edit_jenis_kelamin;
    public $edit_status;
    public $edit_rayon;

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

        $this->edit_id = null;
        $this->edit_nama = '';
        $this->edit_keluarga = '';
        $this->edit_tanggal_lahir = '';
        $this->edit_jenis_kelamin = '';
        $this->edit_status = '';
        $this->edit_rayon = '';        
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

    public function set_edit_state($id) {
        $this->edit_id = $id;

        $editData = JemaatModel::find($id);
        if ($editData) {
            $this->edit_nama = $editData->nama;
            $this->edit_keluarga = $editData->keluarga;
            $this->edit_tanggal_lahir = $editData->tanggal_lahir;
            $this->edit_jenis_kelamin = $editData->jenis_kelamin;
            $this->edit_status = $editData->status;
            $this->edit_rayon = $editData->rayon;
        }
    }

    public function save_edited() {
        $editData = JemaatModel::find($this->edit_id);

        if ($editData) {
            $editData->nama = $this->edit_nama;
            $editData->keluarga = $this->edit_keluarga;
            $editData->tanggal_lahir = $this->edit_tanggal_lahir;
            $editData->jenis_kelamin = $this->edit_jenis_kelamin;
            $editData->status = $this->edit_status;
            $editData->rayon = $this->edit_rayon;
            $editData->save();
        }

        $this->edit_id = null;
        $this->edit_nama = '';
        $this->edit_keluarga = '';
        $this->edit_tanggal_lahir = '';
        $this->edit_jenis_kelamin = '';
        $this->edit_status = '';
        $this->edit_rayon = '';
    }

    public function delete_record($id) {
        $deleteData = JemaatModel::find($id);
        if ($deleteData) {
            $deleteData->delete();
        }
    }


}
