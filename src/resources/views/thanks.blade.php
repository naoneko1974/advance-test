@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('contents')
<div class="thanks__content">
    <div class="thanks__heading">
        <h3>ご意見いただきありがとうございました。</h3>
    </div>
    <a class="thanks__button" href="/index.php">トップページへ</a>
</div>
@endsection