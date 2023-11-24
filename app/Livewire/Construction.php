<?php

namespace App\Livewire;

use App\Models\Construction as ModelsConstruction;
use Carbon\Carbon;
use Livewire\Component;

class Construction extends Component
{
    public $newConstructions;
    public $archiveLinks = [];

    public function mount() {
        // 保存した日付けではなく現場の日付けの最新の順番に３つ取得
        $this->newConstructions = ModelsConstruction::with('memberOfConstructions')->orderByRaw("STR_TO_DATE(date, '%Y-%m-%d') DESC")->take(3)->get();
        // $this->newConstructions = ModelsConstruction::with('memberOfConstructions')->latest()->take(3)->get();

        // 現在の年月を取得
        $now = Carbon::now();

        // アーカイブ
        $archivedDates = ModelsConstruction::whereYear('date', '<=', $now->year)
            ->orWhere(function ($query) use ($now) {
                $query->whereYear('date', $now->year)
                    ->whereMonth('date', '<=', $now->month);
            })
            ->orderBy('date', 'desc')
            ->get();
        // 年月ごとにデータをグループ化
        $archive = $archivedDates->groupBy(function ($date) {
            return Carbon::parse($date->date)->format('Y-m');
        });
        // リンク作成
        foreach ($archive as $yearMonth => $data) {
            $this->archiveLinks[] = [
                'yearMonth' => $yearMonth,
            ];
        }
    }

    public function del(string $id) {
        $delConstruction = ModelsConstruction::find($id);
        $delConstruction->delete();

        return redirect()->route('construction');
    }

    public function render()
    {
        return view('livewire.construction');
    }
}
