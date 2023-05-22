<?php

namespace App\Http\Livewire\Base;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    // Binding Variable
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount() {

    }

    public function render()
    {
        return view('livewire.base.login')->layout('layouts.admin_app');
    }

    public function login() {
        // Auth::logout();
        // dd($this->password);
        // dd($this->email);

        // dd( Auth::attempt(['email' => 'admin@mail.com', 'password' => 'admin']) );
        
        $this->validate();
        
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], true)) {
            // dd('acc');
            return redirect()->route('admin.tambah-anggota');
        }
        else {
            $this->email = '';
            $this->password = '';
        }
    }

}
