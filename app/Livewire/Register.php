<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $campany;
    public $pass;

    public function register() {
        $user = new User();
        $user->name = $this->name;
        $user->campany = $this->campany;
        $user->password = Hash::make($this->pass);
        $user->save();

        return redirect()->route('top');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
