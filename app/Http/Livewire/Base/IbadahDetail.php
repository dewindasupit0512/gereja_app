<?php

namespace App\Http\Livewire\Base;

use App\Models\Peran;
use App\Models\Jemaat;
use App\Models\Anggota;
use Livewire\Component;
use App\Models\JadwalIbadah;

class IbadahDetail extends Component
{
    // Route Binding Variable
    public $ibadah_id;

    // Model Variable
    public $JadwalIbadah;

    public function mount($ibadah_id) {
        $this->ibadah_id = $ibadah_id;

        $this->JadwalIbadah = JadwalIbadah::with(['ibadah', 'peran_anggota'])->find($this->ibadah_id);
        if ($this->JadwalIbadah == null) {
            return abort(404);
        }
        
    }

    public function render()
    {
        return view('livewire.base.ibadah-detail')->layout('layouts.app');
    }

    public function get_jemaat($jemaat_id) {
        return Jemaat::find($jemaat_id);
    }
    public function get_anggota($anggota_id) {
        return Anggota::find($anggota_id);
    }
    public function get_peran($peran_id) {
        return Peran::find($peran_id);
    }


}
