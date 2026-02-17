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
      <p class="dataContentItemP">メールアドレス:{{ $inputs['email'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">パスワード:{{ $inputs['password'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">電話番号:{{ $inputs['phone'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">郵便番号:{{ $inputs['zipcode'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">都道府県:{{ $selectedPrefecture }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">市町村:{{ $inputs['city'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">番地・アパート名:{{ $inputs['address'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">備考欄:{{ $inputs['remarks'] }}</p>
    </div>
    @if(($inputs["mode"] ?? '') === "create")
      <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @foreach ($inputs as $key => $value)
          <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" class="submitButton">登録する</button>
      </form>
    @elseif(($inputs["mode"] ?? '') === "edit")
      <form action="{{ route('admin.users.update', ['id' => $inputs['user_id']]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @foreach ($inputs as $key => $value)
          <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit" class="submitButton">更新する</button>
      </form>
    @else
      <p style="color: red;">modeが不正です。お手数ですが、入力画面からやり直しをお願いいたします。</p>
    @endif

    <form action="{{ route('admin.users.back') }}" method="POST">
      @csrf
      @foreach ($inputs as $key => $value)
        @continue(in_array($key, ['password_confirmation'], true))
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
      @endforeach
    </form>
    <button type="button" class="submitButton" onclick="history.back()">戻る</button>
  </div>
</section>
@endsection