<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Konsultasi as KonsultasiModel;

class Konsultasi extends Component
{
    // Model Variable
    public $Konsultasi;

    public function mount() {
        $this->Konsultasi = KonsultasiModel::get()->sortByDesc('created_at');
    }

    public function render()
    {
        return view('livewire.admin.konsultasi')->layout('layouts.admin_app');
    }

    public function delete_message($id) {
        $deleteMsg = KonsultasiModel::find($id);
        if ($deleteMsg) {
            $deleteMsg->delete();
            return redirect(request()->header('Referer'));
        }
    }
}
