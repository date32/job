<div class="sp-100">
    <div class="bc4 c-white f3 tcenter wi-80 ccenter3 sp-100">仕事の軌跡</div>

    <div class="wi-60 grid5 ccenter3 tcenter sp-90 sp-grid4 mt10">
        <div><a href="/construction">現場一覧</a></div>
        <div><a href="/member">メンバー登録</a></div>
        <div><a href="/campany">会社登録</a></div>
        <div><a href="/">topへ</a></div>
        <div><a class="cursor" wire:click="logout">ログアウト</a></div>
    </div>

    <div class="mt20 wi-60 ccenter3 sp-90">
        <div class="box-shadow3 p20">
            <div class="f1-5 tcenter">会社登録</div>
            <div>
                <form wire:submit.prevent="campanyStore">
                    <div class="mt10 tcenter">
                        <label for="name">会社名:</label>
                        <input type="text" id="name" wire:model="campanyName" required>
                    </div>
                    <div class="mt20"><button class="original-button ccenter3" type="submit">登録</button></div>
                </form>
            </div>
        </div>

        {{-- pc --}}
        <div class="mt20 box-shadow3 p20 sp-none">
            <div class="f1-5 tcenter">会社一覧</div>
            @foreach ($campanies as $item)
                <div class="flex mb20">
                    <div class="wi-40" wire:model="delName">{{ $item->name }}</div>
                    <form class="wi-50" wire:submit.prevent="update({{ $item->id }})">
                        <div class="flex">
                            <div class="wi-80"><input class="wi-80" type="text" placeholder="変更する場合は入力してください"
                                    wire:model="updateName" required>
                            </div>
                            <div class="wi-20"><button class="original-button2" type="submit">変更</button></div>
                        </div>
                    </form>
                    <div class="wi-10" wire:click="del({{ $item->id }})"><button
                            class="original-button3">削除</button></div>
                </div>
            @endforeach
        </div>

        {{-- sp --}}
        <div class="pc-none">
            <div class="box-shadow3">
                <div class="p10 mt30">
                    <div class="f1-5 tcenter mt20">会社一覧</div>
                    @foreach ($campanies as $item)
                        <div class="flex mt50 b p10">
                            <form class="sp-80" wire:submit.prevent="update({{ $item->id }})">
                                    <div wire:model="delName">{{ $item->name }}</div>
                                    <div><input class="sp-100" type="text" placeholder="変更する場合は入力してください"
                                            wire:model="updateName" required>
                                    </div>
                                <div class="flex mt20">
                                    <div class="mr30"><button class="original-button2" type="submit">変更</button>
                                    </div>
                                    <div class="" wire:click="del({{ $item->id }})"><button
                                            class="original-button3">削除</button></div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tcenter mt20"><a href="/">topへ</a></div>
    </div>
    <style>
        @media(max-width: 600px) {
            .sp-original-button3 {
                padding: 10px;
                /* display: flex; */
                /* align-items: center; */
                /* justify-content: center; */
                /* line-height: 1; */
                /* text-decoration: none; */
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

            .sp-original-button3:hover {
                background-image: linear-gradient(180deg, rgba(209, 209, 209, 1), rgba(255, 255, 255, 1));
            }
        }

        .original-button2 {
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
            background-image: linear-gradient(180deg, rgba(253, 255, 136, 1), rgba(209, 209, 209, 1));
        }

        .original-button2:hover {
            background-image: linear-gradient(180deg, rgba(209, 209, 209, 1), rgba(255, 255, 255, 1));
        }

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

        .original-button {
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            text-decoration: none;
            color: #333333;
            font-size: 18px;
            border-radius: 5px;
            width: 200px;
            height: 40px;
            border: 1px solid #333333;
            position: relative;
            transition: 0.3s;
            background-color: #ffffff00;
        }

        .original-button::before,
        .original-button::after {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            right: 15px;
            transform-origin: 100% 50%;
            height: 1px;
            width: 11px;
            background-color: #333;
            border-radius: 2px;
            will-change: transform;
            transition: .3s;
        }

        .original-button::before {
            transform: translateY(-50%) rotate(30deg);
        }

        .original-button::after {
            transform: translateY(-50%) rotate(-30deg);
        }

        .original-button:hover::before {
            transform: translate(5px, -50%) rotate(30deg);
        }

        .original-button:hover::after {
            transform: translate(5px, -50%) rotate(-30deg);
        }
    </style>
</div>
