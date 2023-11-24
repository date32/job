<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Top extends Component
{
    public $name;
    public $pass;
    public $message;

    public function mount() {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
    }

    public function login() {
        if(Auth::attempt(['name' => $this->name, 'password' => $this->pass])) {
            return redirect()->route('dashboard');
        }else {
            $this->message = 'ログイン出来ませんでした。入力情報が間違っています';
        }
    }

    public function render()
    {
        return view('livewire.top');
    }
}
