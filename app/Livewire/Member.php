<?php

namespace App\Livewire;

use App\Models\Campany;
use App\Models\Member as ModelsMember;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Member extends Component
{
    public $name;
    public $campany;
    public $campanies;
    public $members;
    public $updateName;
    public $updateCampany;
    public $test;

    public function mount() {
        $this->campanies = Campany::get();
        $this->members = ModelsMember::get();
    }

    public function memberStore() {
        $member = new ModelsMember();
        $member->user = Auth::user()->name;
        $member->name = $this->name;
        $member->campany = $this->campany;
        $member->save();

        return redirect()->route('member');
    }

    public function del(string $id) {
        $delmember = ModelsMember::find($id);
        $delmember->delete();

        return redirect()->route('member');
    }

    public function update(string $id) {
        if($this->updateName !== null || $this->updateCampany !== null) {
            $updateMember = ModelsMember::find($id);
            if($this->updateName !== null) {
                $updateMember->name = $this->updateName;
            }
            if($this->updateCampany !== null) {
                $updateMember->campany = $this->updateCampany;
            }
            $updateMember->save();
        }

        return redirect()->route('member');
    }

    public function render()
    {
        return view('livewire.member');
    }
}
