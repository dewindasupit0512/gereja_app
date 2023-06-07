<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Keuangan as KeuanganModel;

class Keuangan extends Component
{
    // Binding Variable
    public $amount;
    public $status;
    public $dateRecord;
    public $desc;

    // Model Variable
    public $Keuangan;

    protected $rules = [
        'amount' => 'required|numeric',
        'status' => 'required',
        'dateRecord' => 'required|date',
        'desc' => 'nullable',
    ];

    public function mount() {
        $this->amount = '';
        $this->status = '';
        $this->dateRecord = '';
        $this->desc = '';

        $this->Keuangan = KeuanganModel::orderBy('tanggal_terdaftar', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.admin.keuangan')->layout('layouts.admin_app');;
    }

    public function store_report() {
        $this->validate();
        $report = new KeuanganModel;
        $report->jumlah = $this->amount;
        $report->status = $this->status;
        $report->tanggal_terdaftar = $this->dateRecord;
        $report->keterangan = $this->desc;
        $report->save();

        $this->amount = '';
        $this->status = '';
        $this->dateRecord = '';
        $this->desc = '';
        return redirect(request()->header('Referer'));
    }
    
    public function delete_report($id) {
        $deleteData = KeuanganModel::find($id);
        if ($deleteData) {
            $deleteData->delete();
        }
        return redirect(request()->header('Referer'));
    }

}
