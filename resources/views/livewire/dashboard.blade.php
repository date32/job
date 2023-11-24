<div class="sp-100">
    <div class="bc4 c-white f3 tcenter wi-80 ccenter3 sp-100">仕事の軌跡</div>
    <div class="f1-5 wi-50 grid2 ccenter3 tcenter sp-90 sp-grid2 sp-f1 mt10">
        <div>こんにちは{{ $name }}さん</div>
        <div>{{ $today }}</div>
    </div>
    
    <div class="wi-60 grid5 ccenter3 tcenter sp-90 sp-grid4 mt10">
        <div><a href="/construction">現場一覧</a></div>
        <div><a href="/member">メンバー登録</a></div>
        <div><a href="/campany">会社登録</a></div>
        <div><a href="/">topへ</a></div>
        <div><a class="cursor" wire:click="logout">ログアウト</a></div>
    </div>

    <form wire:submit.prevent="constructionStore">
        <div class="mt20 mb20 wi-50 ccenter3 sp-90 box-shadow3 p20">
            <div class="tcenter f1-5">現場登録</div>
            <div class="tcenter mt20">
                <div>【日付け】</div>
                <div><input type="date" wire:model="date" required></div>
            </div>
    
            <div class="mt20 tcenter">
                <div><label for="place">【場所】</label></div>
                <div><input type="text" id="place" wire:model="place" required></div>  
            </div>
    
            <div class="mt20 tcenter">
                <div>【現場写真】</div>
                <div><input type="file" wire:model="image"></div>
    
                @if ($image)
                    <div>
                        <img class="mt10 ra10 ccenter3 wi4 sp-50"
                            src="{{ asset('storage/' . $image->store('images', 'public')) }}?{{ time() }}"
                            alt="アップロードされた画像">
                    </div>
                @endif
            </div>
    
            <div class="mt20 tcenter">
                <div>【時間】</div>
                <div class="grid7 sp-none">
                    <div>
                        <select wire:model="hourStart" required>
                            <option>時</option>
                            @for ($i = 1; $i <= 24; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="ccenter4 f1-5">:</div>
                    <div>
                        <select wire:model="minuteStart" required>
                            <option>分</option>
                            <option value="00">0</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class="ccenter4 f1-5">～</div>
                    <div>
                        <select wire:model="hourEnd" required>
                            <option>時</option>
                            @for ($i = 1; $i <= 24; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="ccenter4 f1-5">:</div>
                    <div>
                        <select wire:model="minuteEnd" required>
                            <option>分</option>
                            <option value="00">0</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>

                <div class="pc-none">
                    <div class="sp-grid4">
                        <div class="ccenter4">自：</div>
                        <div>
                            <select wire:model="hourStart" required>
                                <option>時</option>
                                @for ($i = 1; $i <= 24; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="ccenter4 f1-5">:</div>
                        <div>
                            <select wire:model="minuteStart" required>
                                <option>分</option>
                                <option value="00">0</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="sp-grid4 mt10">
                        <div class="ccenter4">至：</div>
                        <div>
                            <select wire:model="hourEnd" required>
                                <option>時</option>
                                @for ($i = 1; $i <= 24; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="ccenter4 f1-5">:</div>
                        <div>
                            <select wire:model="minuteEnd" required>
                                <option>分</option>
                                <option value="00">0</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
    
            <div class="mt20">
                <div class="tcenter">【メンバー】</div>
                <div class="tcenter">※複数選択可</div>
                <div class="flex-wrap">
                    <div class="mr20">
                        <input type="checkbox" id="auth" wire:model="inputMembers" value="{{ $auth->name }}({{ $auth->campany }})"
                            name="1">
                        <label for="auth">{{ $auth->name }}({{ $auth->campany }})</label>
                    </div>
                    @foreach ($members as $member)
                        <div class="mr20">
                            <input type="checkbox" id="{{ $member->name }}" wire:model="inputMembers"
                                value="{{ $member->name }}({{ $member->campany }})" name="1">
                            <label for="{{ $member->name }}">{{ $member->name }}({{ $member->campany }})</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt20"><button class="original-button ccenter3" type="submit">登録</button></div>
        </div>
    </form>

    

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
    </style>
</div>
