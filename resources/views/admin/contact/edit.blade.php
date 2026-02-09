@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin.contact.edit') }}
<div class="contentsArea">
  <div class="contentsArea__header">
    <h2 class="contentsArea__header__title">{{$title}}</h2>
  </div>
  <div class="contentsArea__content">
    <section class="admin-contact">
        <form action="#">
          <div class="dataContentItem">
            <h3>ステータス</h3>
            <select id="status" name="status" class="select">
              <option value="">未対応</option>
              <option value="対応中">対応中</option>
              <option value="完了">対応済</option>
            </select>
            @error('status')
            <span class="errorMessage">{{ $message }}</span>
            @enderror
          </div>
          <div class="dataContentItem">
            <h3>お問い合わせ内容</h3>
            <p class="dataContentItemP">{{ $contact['contact'] }}</p>
          </div>
          <div class="dataContentItem">
            <h3>備考欄</h3>
            <textarea id="memo" name="memo" class="textArea"></textarea>
            @error('memo')
            <span class="errorMessage">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <h3>お問い合わせ情報</h3>
            <div class="dataContentItem">
              <p class="dataContentItemP">会社名:{{ $contact['company'] }}</p>
            </div>
            <div class="dataContentItem">
              <p class="dataContentItemP">氏名:{{ $contact['name'] }}</p>
            </div>
            <div class="dataContentItem">
              <p class="dataContentItemP">電話番号:{{ $contact['phone'] }}</p>
            </div>
            <div class="dataContentItem">
              <p class="dataContentItemP">メールアドレス:{{ $contact['mail'] }}</p>
            </div>
            <div class="dataContentItem">
              <p class="dataContentItemP">生年月日:{{ $contact['birthday'] }}</p>
            </div>
            <div class="dataContentItem">
              <p class="dataContentItemP">性別:{{ $contact['sex'] }}</p>
            </div>
            <div class="dataContentItem">
              <p class="dataContentItemP">職業:{{ $contact['job'] }}</p>
            </div>
          </div>
          @csrf
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <button type="submit" class="submitButton">登録する</button>
          <!-- <button type="button" class="submitButton" onclick="history.back()">戻る</button> -->
        </form>
    </section>
  </div>
</div>
@endsection