@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contents')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
    </div>
    <form class="form" action="contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input--name">
                        <div class="form__input--first-name">
                            <input type="text" name="first-name" value="{{ old('first-name') }}" />
                            <p class="form__example--text">例）山田</p>
                            <div class="form__error">
                                @error('first-name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__input--last-name">
                            <input type="text" name="last-name" value="{{ old('last-name') }}" />
                            <p class="form__example--text">例）太郎</p>
                            <div class="form__error">
                                @error('last-name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" value="1" style="transform:scale(2.0);" checked>男性
                    <input type="radio" name="gender" value="2" style="transform:scale(2.0);">女性
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email') }}" />
                    <p class="form__example--text">例）test@example.com</p>
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="form__input--postcode">
                        <span>〒</span>
                        <input type="text" id="郵便番号" name="postcode" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value=" {{ old('postcode') }}">
                    </div>
                    <p class="form__example--postcode">例）123-4567</p>
                    <div class="form__error--postcode">
                        @error('postcode')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" id="住所" name="address" value="{{ old('address') }}" />
                    <p class="form__example--text">例）東京都千代田区千駄ヶ谷1-2-3</p>
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building_name" value="{{ old('building_name') }}" />
                    <p class="form__example--text">例）千駄ヶ谷マンション101</p>
                </div>
                <div class="form__error">
                    @error('building_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">ご意見</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="opinion">{{ old('opinion') }}</textarea>
                </div>
                <div class="form__error">
                    @error('opinion')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認</button>
        </div>
    </form>
</div>
@endsection