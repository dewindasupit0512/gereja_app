<?php

namespace App\Http\Livewire\Base;

use DateTime;
use App\Models\Jemaat;
use Livewire\Component;
use App\Models\JadwalGenerate;
use Illuminate\Support\Facades\Hash;

class HomePage extends Component
{
    
    // Model Variable
    public $JadwalGenerate;

    public function mount() {
        $this->JadwalGenerate = JadwalGenerate::with(['jadwal_ibadah', 'ibadah'])
                                    ->where('active_status', '=', true)
                                    ->get();
        // dd( $this->JadwalGenerate->first(), $this->get_relevant_jadwal($this->JadwalGenerate->first()) );
    }

    public function render()
    {
        return view('livewire.base.home-page')->layout('layouts.app');
    }

    public function get_relevant_jadwal($JadwalGenerate) {
        // $date_now = date('Y-m-d');
        $today = new DateTime('now');
        $closestDate = null;
        $closestDiff = null;
        $jadwal_return = null;

        foreach ($JadwalGenerate->jadwal_ibadah as $jadwal) {
            $date = $jadwal->waktu;
            $diff = abs($today->diff(new DateTime($date))->days);
            if ($closestDiff === null || $diff < $closestDiff) {
                $closestDiff = $diff;
                $closestDate = $date;
                $jadwal_return = $jadwal;
            }
        }
        return $jadwal_return;
    }

    public function get_jemaat($jemaat_id) {
        return Jemaat::find($jemaat_id);
    }

    function get_time($datetime_input): string
    {
        $datetime = new DateTime($datetime_input);
        return $datetime->format('H:i');
    }

    function get_date($datetime_input): string
    {
        $datetime = new DateTime($datetime_input);
        return $datetime->format('m-d-Y');
    }
    
}
