<?php

namespace App\Http\Livewire\Base;

use Livewire\Component;
use App\Models\Konsultasi;

class Contact extends Component
{

    // Binding Variable
    public $name_input;
    public $email_input;
    public $phone_input;
    public $message_input;

    protected $rules = [
        'name_input' => 'required',
        'email_input' => 'required',
        'phone_input' => 'required',
        'message_input' => 'required',
    ];

    public function mount() {
        $this->name_input = '';
        $this->email_input = '';
        $this->phone_input = '';
        $this->message_input = '';
    }

    public function render()
    {
        return view('livewire.base.contact')->layout('layouts.app');
    }

    public function store_konsultasi() {
        $this->validate();
        $konsultasi = new Konsultasi;
        $konsultasi->name = $this->name_input;
        $konsultasi->email = $this->email_input;
        $konsultasi->phone = $this->phone_input;
        $konsultasi->message = $this->message_input;
        $konsultasi->save();

        $this->name_input = '';
        $this->email_input = '';
        $this->phone_input = '';
        $this->message_input = '';
    }

}
