@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('contents')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>内容確認</h2>
    </div>
    <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm__group">
            <div class="confirm__group-title">
                <span class="confirm__label--item">お名前</span>
            </div>
            <div class="confirm__group-content">
                <div class="confirm__input--text">
                    <input type="text" name="fullname" value="{{ $contacts['first-name'] . ' ' . $contacts['last-name'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="confirm__group">
            <div class="confirm__group-title">
                <span class="confirm__label--item">性別</span>
            </div>
            <div class="confirm__group-content">
                <div class="confirm__input--text">
                    @if($contacts['gender']==1)
                    <input type="text" value="男性" readonly />
                    @else
                    <input type="text" value="女性" readonly />
                    @endif
                    <input type="hidden" name="gender" value="{{ $contacts['gender'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="confirm__group">
            <div class="confirm__group-title">
                <span class="confirm__label--item">メールアドレス</span>
            </div>
            <div class="confirm__group-content">
                <div class="confirm__input--text">
                    <input type="email" name="email" value="{{ $contacts['email'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="confirm__group">
            <div class="confirm__group-title">
                <span class="confirm__label--item">郵便番号</span>
            </div>
            <div class="confirm__group-content">
                <div class="confirm__input--text">
                    <input type="text" name="postcode" value="{{ $contacts['postcode'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="confirm__group">
            <div class="confirm__group-title">
                <span class="confirm__label--item">住所</span>
            </div>
            <div class="confirm__group-content">
                <div class="confirm__input--text">
                    <input type="text" name="address" value="{{ $contacts['address'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="confirm__group">
            <div class="confirm__group-title">
                <span class="confirm__label--item">建物名</span>
            </div>
            <div class="confirm__group-content">
                <div class="confirm__input--text">
                    <input type="text" name="building_name" value="{{ $contacts['building_name'] }}" readonly />
                </div>
            </div>
        </div>
        <div class="confirm__group">
            <div class="confirm__group-title">
                <span class="confirm__label--item">ご意見</span>
            </div>
            <div class="confirm__group-content">
                <div class="confirm__input--textarea">
                    <textarea name="opinion" readonly>{{ $contacts['opinion'] }}</textarea>
                </div>
            </div>
        </div>
        <div class="confirm__button">
            <button class="confirm__button-submit" type="submit">送信</button>
        </div>
        <a class="confirm__return" href="#" onclick="history.back()">修正する</a>
    </form>
</div>
@endsection