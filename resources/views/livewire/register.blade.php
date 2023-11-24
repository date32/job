<div class="sp-100">
    <div class="bc4 c-white f3 tcenter wi-80 ccenter3 sp-100">仕事の軌跡</div>

    <div class="wi-50 ccenter3 mt20 box-shadow2 sp-90">
        <form wire:submit.prevent="register">
            <div class="p10">
                <div class="tcenter f2">新規登録</div>
                <div class="mt10">
                    <div><label for="name">ユーザー名</label></div>
                    <div><input type="text" id="name" wire:model="name" required></div>
                </div>
                <div class="mt10">
                    <div><label for="campany">会社名</label></div>
                    <div><input type="text" id="campany" wire:model="campany" required></div>
                </div>
                <div class="mt10">
                    <div><label for="pass">パスワード</label></div>
                    <div><input type="text" id="pass" wire:model="pass" required></div>
                </div>
                <div class="mt20"><button class="original-button" type="submit">登録する</button></div>
            </div>
        </form>
    </div>

    <div class="tcenter mt30"><a href="/">Topへ</a></div>

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
