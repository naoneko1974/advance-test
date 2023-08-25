@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection

@section('contents')

<div class="search-form__content">
    <div class="search-form__heading">
        <h2>管理システム</h2>
    </div>
    <form class="search-form" action="/contacts/search" method="get">
        @csrf
        <div class="search-border">
            <div class="search__group">
                <div class="search__group-title">
                    <span class="search__label--item">お名前</span>
                </div>
                <div class="search__group-content">
                    <div class="search__input--text">
                        <input type="text" name="name_keyword" value="{{ old('name_keyword') }}">
                    </div>
                </div>
                <div class="search__group-title">
                    <span class="search__label--item-gender">性別</span>
                </div>
                <div class="search__group-content">
                    <div class="search__input--radio">
                        <input type="radio" name="gender_keyword" value="0" style="transform:scale(2.0);" checked>全て
                        <input type="radio" name="gender_keyword" value="1" style="transform:scale(2.0);">男性
                        <input type="radio" name="gender_keyword" value="2" style="transform:scale(2.0);">女性
                    </div>
                </div>
            </div>
            <div class="search__group">
                <div class="search__group-title">
                    <span class="search__label--item">登録日</span>
                </div>
                <div class="search__group-content">
                    <div class="search__input--text">
                        <input type="date" name="start_date_keyword" value="{{ old('start_date_keyword') }}">
                    </div>
                    <span class="search__label--item-span">～</span>
                    <div class="search__input--text">
                        <input type="date" name="end_date_keyword" value="{{ old('end_date_keyword') }}">
                    </div>
                </div>
            </div>
            <div class="search__group">
                <div class="search__group-title">
                    <span class="search__label--item">メールアドレス</span>
                </div>
                <div class="search__group-content">
                    <div class="search__input--text">
                        <input type="text" name="email_keyword" value="{{ old('email_keyword') }}">
                    </div>
                </div>
            </div>
            <div class="search__button">
                <button class="search__button-submit" type="submit">検索</button>
            </div>
            <a class="search__reset" href="/manage">リセット</a>
        </div>

    </form>
</div>

<div class="page-custom">
    {{ $contacts->links() }}
</div>

<div class="contact-table">

    <table class=" contact-table__inner">
        @if(session('message'))
        <div class="contact__alert--success">
            {{ session('message') }}
        </div>
        @endif
        <tr class="contact-table__row">
            <th class="contact-table__header">
                <span class="contact-table__header-span1">ID</span>
                <span class="contact-table__header-span2">お名前</span>
                <span class="contact-table__header-span3">性別</span>
                <span class="contact-table__header-span4">メールアドレス</span>
                <span class="contact-table__header-span5">ご意見</span>
            </th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="contact-table__row">
            <td class="contact-table__item">
                <form class="delete-form" action="/contacts/delete" method="post">
                    @method('DELETE') @csrf
                    <div class="delete-form__item">
                        <input class="delete-form__item-id" type="text" name="id" value="{{ $contact['id'] }}" readonly />
                        <input class="delete-form__item-name" type="text" name="fullname" value="{{ $contact['fullname'] }}" readonly />
                        @if($contact['gender']==1)
                        <input class="delete-form__item-gender" type="text" value="男性" readonly />
                        @else
                        <input class="delete-form__item-gender" type="text" value="女性" readonly />
                        @endif
                        <input class="delete-form__item-email" type="text" name="email" value="{{ $contact['email'] }}" readonly />
                        <input class="delete-form__item-opinion" type="text" name="opinion" value="{{ $contact['opinion'] }}" readonly />
                    </div>
                    <div class="delete-form__button">
                        <button class="delete-form__button-submit" type="submit">
                            削除
                        </button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection