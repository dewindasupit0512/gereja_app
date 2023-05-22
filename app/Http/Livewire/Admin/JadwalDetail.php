<?php

namespace App\Http\Livewire\Admin;

use App\Models\Peran;
use App\Models\Jemaat;
use App\Models\Anggota;
use Livewire\Component;
use App\Models\JadwalIbadah;
use App\Models\JadwalGenerate;

class JadwalDetail extends Component
{
    // Route Binding Variable
    public $generate_id;

    // Model Variable
    public $JadwalIbadah;
    public $JadwalGenerate;
    public $Jemaat;

    // Binding Variable
    public $perans;
    public $status;

    protected $listeners = ['updateDateTime' => 'update_date_time'];

    public function mount($generate_id) {
        $this->generate_id = $generate_id;

        $this->JadwalIbadah = JadwalIbadah::with([
            'lokasi',
            'pelayanan_ibadah',
            'peran_anggota',
        ])->where('generate_id', '=', $this->generate_id)->get();
        
        $this->perans = [];
        
        $this->JadwalGenerate = JadwalGenerate::with('ibadah')->find($this->generate_id);
        $this->status = $this->JadwalGenerate->active_status;
        
        $this->Jemaat = Jemaat::where('status', '=', $this->JadwalGenerate->ibadah->status)->get();
        
        foreach($this->JadwalIbadah->first()->peran_anggota as $peran) {
            array_push($this->perans, $this->get_peran($peran->id_peran));
        }
    }

    public function render()
    {
        return view('livewire.admin.jadwal-detail')->layout('layouts.admin_app');;
    }

    public function save_changed() {
        $this->JadwalGenerate->active_status = $this->status;
        $this->JadwalGenerate->save();
        return redirect()->route('admin.atur-jadwal');
    }

    private function get_peran($id) {
        $Peran = Peran::find($id);
        return $Peran;
    }
    
    private function get_anggota($id) {
        $Anggota = Anggota::find($id);
        return $Anggota;
    }

    public function update_date_time($jadwal_id, $values) {
        $jadwalUpdate = JadwalIbadah::find($jadwal_id);
        if ($jadwalUpdate) {
            $jadwalUpdate->waktu = $values;
            $jadwalUpdate->save();
            return redirect(request()->header('Referer'));
        }

    }

    public function delete_jadwal_ibadah($jadwal_id) {
        $jadwalDelete = JadwalGenerate::find($jadwal_id);
        if ($jadwalDelete) {
            $jadwalDelete->delete();
            return redirect()->route('admin.atur-jadwal');
        }
    }


}
