@extends('layouts.user_base')
@section('title', '内容確認')
@section('content')

<section class="confirm">
  <div class="contactMainBox">
    <div class="dataContentItem">
      <p class="dataContentItemP">名前:{{ $validated['name'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">フリガナ:{{ $validated['name_kana'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">メールアドレス:{{ $validated['mail'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">パスワード:{{ $validated['password'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">電話番号:{{ $validated['phone'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">郵便番号:{{ $validated['postcode'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">都道府県:{{ $selectedPrefecture }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">市町村:{{ $validated['city'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">番地・アパート名:{{ $validated['address_line1'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">備考欄:{{ $validated['memo'] }}</p>
    </div>
    <form action="{{ route('admin.users.send') }}" method="POST">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      @foreach ($validated as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
      @endforeach
      <button type="submit" class="submitButton">送信する</button>
    </form>
    <button type="button" class="submitButton" onclick="history.back()">戻る</button>
  </div>
</section>
@endsection