<div class="sp-100">
    <div class="bc4 c-white f3 tcenter wi-80 ccenter3 sp-100">仕事の軌跡</div>

    <div class="wi-50 ccenter3 grid2 mt20 sp-90 sp-block">
        <div class="box-shadow2 sp-p10"><a href="/register" class="f2">新規登録</a></div>

        <div class="box-shadow2 sp-mt50">
            <form wire:submit.prevent="login">
                <div class="p20">
                    <div class="f2 tcenter">ログイン</div>
                    <div class="mt10">
                        <div><label for="name">ユーザー名</label></div>
                        <div><input type="text" id="name" wire:model="name" required></div>
                    </div>
                    <div class="mt10">
                        <div><label for="pass">パスワード</label></div>
                        <div><input type="text" id="pass" wire:model="pass" required></div>
                    </div>
                    <div class="mt20"><button class="original-button" type="submit">ログインする</button></div>
                    <div>{{ $message }}</div>
                </div>
            </form>
        </div>
    </div>

    <div class="wi-80 ccenter3 mt20 tr">since.2023.11.24</div>
    <div class="wi-80 ccenter3 tr">Ver2</div>

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
