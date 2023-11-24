<?php

namespace App\Livewire;

use App\Models\Construction;
use Livewire\Component;

class Past extends Component
{
    public $yearMonth;
    public $constructions;

    public function mount(string $id) {
        $this->yearMonth = $id;
        $this->constructions = Construction::with('memberOfConstructions')->where('date', 'like', '%' . $id . '%')->get();
    }

    public function del(string $id) {
        $delConstruction = Construction::find($id);
        $delConstruction->delete();

        return redirect('/past/' . $this->yearMonth);
    }

    public function render()
    {
        return view('livewire.past');
    }
}
