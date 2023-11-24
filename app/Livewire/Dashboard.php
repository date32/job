<?php

namespace App\Livewire;

use App\Models\Construction;
use App\Models\Member;
use App\Models\MemberOfConstruction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class Dashboard extends Component
{
    use WithFileUploads;

    public $auth;
    public $today;
    public $name;
    public $members;
    public $date;
    public $place;
    public $hourStart;
    public $minuteStart;
    public $hourEnd;
    public $minuteEnd;
    public $inputMembers = [];
    public $image;

    public function mount() {
        $this->auth = Auth::user();
        $this->today = Carbon::now()->isoformat('Y年M月D日 (ddd)');
        $this->name = Auth::user()->name;
        $this->members = Member::get();
    }

    public function constructionStore() {
        $construnction = new Construction();
        $construnction->user = Auth::user()->id;
        $construnction->date = $this->date;

        // $dateをCarbonオブジェクトに変換
        $carbonDate = Carbon::parse($this->date);

        // 曜日を取得（日曜日が0、月曜日が1、...、土曜日が6）
        $dayOfWeek = $carbonDate->dayOfWeek;

        $week = ['(日)', '(月)', '(火)', '(水)', '(木)', '(金)', '(土)'];

        // 曜日を表示用に変換（日曜日が'日'、月曜日が'月'、...、土曜日が'土'）
        $weekString = $week[$dayOfWeek];
        $construnction->dateString = $this->date . $weekString;

        $construnction->place = $this->place;
        $construnction->time = $this->hourStart . ':' . $this->minuteStart . '～' . $this->hourEnd . ':' . $this->minuteEnd;

        if ($this->image != null) {

            // ディレクトリ名
            $dir = 'img';

            // ファイル名変更
            $file_name = Auth::user()->id . $this->date . $this->place . '.jpg';

            // ファイルを保存　storageというフォルダに保存される
            $this->image->storeAs('public/' . $dir, $file_name);
            // 表示するパスは/storage/ディレクトリ名/ファイル名　publicの直下を参照する
            $construnction->img = '/storage' . '/' . $dir . '/' . $file_name;
        }

        $construnction->save();

        foreach($this->inputMembers as $member) {
            $memberOfConstruction = new MemberOfConstruction();
            $newConstructionId = Construction::latest()->first()->id;
            $memberOfConstruction->user = Auth::user()->id;
            $memberOfConstruction->constructionId = $newConstructionId;
            $memberOfConstruction->member = $member;
            $memberOfConstruction->save();
        }

        return redirect()->route('dashboard');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('top');
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
