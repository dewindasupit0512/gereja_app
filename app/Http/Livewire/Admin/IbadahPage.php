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

    protected $rules = [
        'nama_ibadah' => 'required|string',
        'hari_ibadah' => 'required',
        'waktu_ibadah' => 'required',
    ];

    public function mount() {
        $this->nama_ibadah = '';
        $this->hari_Ibadah = '';
        $this->waktu_ibadah = '';
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

}
