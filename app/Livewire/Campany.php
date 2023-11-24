<?php

namespace App\Livewire;

use App\Models\Campany as ModelsCampany;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Campany extends Component
{
    public $campanies;
    public $campanyName;
    public $pass;
    public $delName;
    public $updateName;

    public function mount() {
        $this->campanies = ModelsCampany::get();
        $this->pass = Auth::user()->password;
    }

    public function campanyStore() {
        $campany = new ModelsCampany();
        $campany->user = Auth::user()->name;
        $campany->name = $this->campanyName;
        $campany->save();

        return redirect()->route('campany');
    }

    public function del(string $id) {
        $delCampany = ModelsCampany::find($id);
        $delCampany->delete();

        return redirect()->route('campany');
    }

    public function update(string $id) {
        $updateName = ModelsCampany::find($id);
        $updateName->name = $this->updateName;
        $updateName->save();

        return redirect()->route('campany');
    }

    public function render()
    {
        return view('livewire.campany');
    }
}
