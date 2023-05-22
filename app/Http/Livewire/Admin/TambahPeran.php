<?php

namespace App\Http\Livewire\Admin;

use App\Models\Peran;
use Livewire\Component;

class TambahPeran extends Component
{
    // Model Variable
    public $peran_model;
    
    // Binding Variable
    public $peran;

    protected $rules = [
        'peran' => 'required|string',
    ];

    public function mount() {
        $this->peran_model = Peran::orderBy('updated_at', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.admin.tambah-peran', ['perans' => $this->peran_model])->layout('layouts.admin_app');
    }

    public function simpan_peran() {
        $peran = new Peran;
        $peran->peran = $this->peran;
        $peran->save();

        return redirect(request()->header('Referer')); 
    }

    public function hapus_peran($id) {
        $peran = Peran::find($id);
        if ($peran) {
            $peran->delete();
        }
        return redirect(request()->header('Referer')); 
    }

}
