<div class="sp-100">
    <div class="bc4 c-white f3 tcenter wi-80 ccenter3 sp-100">仕事の軌跡</div>

    <div class="wi-60 grid5 ccenter3 tcenter sp-90 sp-grid4 mt10">
        <div><a href="/construction">現場一覧</a></div>
        <div><a href="/member">メンバー登録</a></div>
        <div><a href="/campany">会社登録</a></div>
        <div><a href="/">topへ</a></div>
        <div><a class="cursor" wire:click="logout">ログアウト</a></div>
    </div>

    <div class="box-shadow3 mt20 wi-70 ccenter3 p20 sp-90">
        <div class="tcenter f1-5">メンバー登録</div>
        <form wire:submit.prevent="memberStore">
            <div class="tcenter mt10">
                <label for="name">名前</label>
                <div><input type="text" id="name" wire:model="name" required></div>
            </div>
            <div class="tcenter mt10">
                <div>所属会社</div>
                <select id="campany" wire:model="campany">
                    <option value="">選択してください</option>
                    @foreach ($campanies as $campany)
                        <option value="{{ $campany->name }}">{{ $campany->name }}</option>
                    @endforeach
                </select>
                <div><a href="/campany">新規で会社を登録する</a></div>
            </div>
            <div class="mt20"><button class="original-button ccenter3" type="submit">登録</button></div>
        </form>
    </div>

    <div class="box-shadow3 mt20 wi-70 ccenter3 p20 sp-90">
        <div class="tcenter f1-5">メンバー一覧</div>
        @foreach ($members as $member)
            <form wire:submit.prevent="update({{ $member->id }})">
          
                <div class="mt20 b p20">
                    <div class="flex sp-block">
                        <div class="wi-40 sp-100">{{ $member->name }}</div>
                        <div class="wi-60 sp-100">
                            <input class="wi-100" type="text" placeholder="名前の変更" wire:model="updateName">
                        </div>
                    </div>
    
                    <div class="flex ccenter4 sp-block mt10">
                        <div class="wi-40 sp-100">{{ $member->campany }}</div>
                        <div class="wi-60 sp-100">
                            <select class="sp-100" id="updateCampany" wire:model="updateCampany">
                                <option>所属会社の変更</option>
                                @foreach ($campanies as $campany)
                                    <option value="{{ $campany->name }}">{{ $campany->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="flex mt10">
                        <div class="mr30"><button class="original-button2" type="submit">変更</button></div>
                        <div wire:click="del({{ $member->id }})"><button class="original-button3">削除</button></div>
                    </div>
                </div>
                    
            </form>
            
        @endforeach
    </div>

    <div class="tcenter mt20"><a href="/">topへ</a></div>

    <style>
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
    </style>
</div>
