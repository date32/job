<div class="sp-100">
    <div class="bc4 c-white f3 tcenter wi-80 ccenter3 sp-100">仕事の軌跡</div>

    <div class="wi-60 grid5 ccenter3 tcenter sp-90 sp-grid4 mt10">
        <div><a href="/construction">現場一覧</a></div>
        <div><a href="/member">メンバー登録</a></div>
        <div><a href="/campany">会社登録</a></div>
        <div><a href="/">topへ</a></div>
        <div><a class="cursor" wire:click="logout">ログアウト</a></div>
    </div>

    <div class="tcenter f1-5 mt20">現場一覧</div>

    <div class="box-shadow3 mt20 wi-80 ccenter3 p20 sp-90">
        <div class="tcenter">最近の現場</div>
        @foreach ($newConstructions as $newConstruction)
            <div class="mt20 b p10">
                <div>{{ $newConstruction->dateString }}</div>
                <div>{{ $newConstruction->place }}</div>
                <div class="wi-80 ccenter3"><img class="ccenter3 ra10" src="{{ $newConstruction->img }}" alt="">
                </div>
                <div>{{ $newConstruction->time }}</div>
                <div class="flex">
                    @foreach ($newConstruction->memberOfConstructions as $memberOfConstruction)
                        <div class="mr20">{{ $memberOfConstruction->member }}</div>
                    @endforeach
                </div>

                <div class="mt20" wire:click="del({{ $newConstruction->id }})"><button
                        class="original-button3 ccenter3">この現場を削除</button></div>
            </div>
        @endforeach
    </div>

    <div class="box-shadow3 mt20 wi-80 ccenter3 p20 sp-90">
        <div class="tcenter">アーカイブ</div>
        <div class="tcenter">
            @foreach ($archiveLinks as $item)
                @foreach ($item as $yearMonth)
                    <div><a href="/past/{{ $yearMonth }}">{{ $yearMonth }}</a></div>
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="tcenter mt20"><a href="/">topへ</a></div>

    <style>
        .original-button3 {
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            text-decoration: none;
            color: #000000;
            font-size: 18px;
            border-radius: 3px;
            /* width: 200px; */
            /* height: 40px; */
            border: 1px solid #bbbbbb;
            transition: 0.3s;
            transform: skew(-15deg) rotate(-3deg);
            background-image: linear-gradient(180deg, rgba(255, 67, 106, 1), rgba(209, 209, 209, 1));
        }

        .original-button3:hover {
            background-image: linear-gradient(180deg, rgba(209, 209, 209, 1), rgba(255, 255, 255, 1));
        }
    </style>
</div>
