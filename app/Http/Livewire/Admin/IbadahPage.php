<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ibadah;
use Livewire\Component;
use Illuminate\Support\Str;

class IbadahPage extends Component
{
    // Binding Variable
    public $nama_ibadah;
    public $hari_ibadah;
    public $waktu_ibadah;

    public $edit_id;
    public $edit_day;
    public $edit_time;

    protected $rules = [
        'nama_ibadah' => 'required|string',
        'hari_ibadah' => 'required',
        'waktu_ibadah' => 'required',
    ];

    public function mount() {
        $this->nama_ibadah = '';
        $this->hari_Ibadah = '';
        $this->waktu_ibadah = '';
        $this->edit_id = null;
        $this->edit_day = '';
        $this->edit_time = '';
    }

    public function render()
    {
        $ibadah_list = Ibadah::get()->all();

        return view('livewire.admin.ibadah-page', ['ibadah_list' => $ibadah_list])->layout('layouts.admin_app');
    }
    
    public function tambah_ibadah() {
        $this->validate();
        
        $ibadah = new Ibadah;
        $ibadah->name = $this->nama_ibadah;
        $ibadah->name_slug = Str::slug($this->nama_ibadah);
        $ibadah->hari = $this->hari_ibadah;
        $ibadah->jam = $this->waktu_ibadah;
        $ibadah->save();

        $this->nama_ibadah = '';
        $this->hari_ibadah = '';
    }

    public function translate_hari($num) {
        if ($num == 0) {
            return 'Minggu';
        }
        if ($num == 1) {
            return 'Senin';
        }
        if ($num == 2) {
            return 'Selasa';
        }
        if ($num == 3) {
            return 'Rabu';
        }
        if ($num == 4) {
            return 'Kamis';
        }
        if ($num == 5) {
            return 'Jumat';
        }
        if ($num == 6) {
            return 'Sabtu';
        }
        return null;
    }

    public function set_edit_state($id) {
        $this->edit_id = $id;

        $editData = Ibadah::find($id);
        if ($editData) {
            $this->edit_day = $editData->hari;
            $this->edit_time = $editData->jam;
        }
    }

    public function save_edited() {
        $editIbadah = Ibadah::find($this->edit_id);
        if ($editIbadah) {
            $editIbadah->hari = $this->edit_day;
            $editIbadah->jam = $this->edit_time;
            $editIbadah->save();
        }
        
        $this->edit_id = null;
        $this->edit_day = '';
        $this->edit_time = '';
    }

    public function delete_record($id) {
        $deleteData = Ibadah::find($id);
        if ($deleteData) {
            $deleteData->delete();
        }
    }

}
