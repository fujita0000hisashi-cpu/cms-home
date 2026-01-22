@extends('layouts.user_base')
@section('title', '内容確認')
@section('content')

<section class="confirm">
  <div class="contactMainBox">
    <div class="dataContentItem">
      <p class="dataContentItemP">会社名:{{ $validated['company'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">氏名:{{ $validated['name'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">電話番号:{{ $validated['phone'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">メールアドレス:{{ $validated['mail'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">生年月日:{{ $validated['birthday'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">性別:{{ $validated['sex'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">職業:{{ $validated['job'] }}</p>
    </div>
    <div class="dataContentItem">
      <p class="dataContentItemP">お問い合わせ内容:{{ $validated['contact'] }}</p>
    </div>
    <form action="{{ route('contact.send') }}" method="POST">
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