@extends('layouts.user_base')
@section('title', '内容確認')
@section('content')

<section class="confirm">
  <div class="contactMainBox">
    <div class="dataContentItem">
      <p class="dataContentItemP">名前:{{ $inputs['name'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">フリガナ:{{ $inputs['name_kana'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">メールアドレス:{{ $inputs['mail'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">パスワード:{{ $inputs['password'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">電話番号:{{ $inputs['phone'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">郵便番号:{{ $inputs['postcode'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">都道府県:{{ $selectedPrefecture }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">市町村:{{ $inputs['city'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">番地・アパート名:{{ $inputs['address_line1'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">備考欄:{{ $inputs['memo'] }}</p>
    </div>
    <form action="{{ route('admin.users.send') }}" method="POST">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      @foreach ($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
      @endforeach
      <button type="submit" class="submitButton">送信する</button>
    </form>
    <button type="button" class="submitButton" onclick="history.back()">戻る</button>
  </div>
</section>
@endsection