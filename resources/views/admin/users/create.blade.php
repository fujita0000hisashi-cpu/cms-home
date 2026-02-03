@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin.users.create', $title) }}
<div class="contentsArea">
  <div class="contentsArea__header">
    <h2 class="contentsArea__header__title">{{$title}}</h2>
    <ul class="contentsArea__header__btnArea">
      <li><a href="#">新規登録</a></li>
    </ul>
  </div>
  <div class="contentsArea__content">
    <form action="{{ route('admin.users.confirm') }}" method="POST">
			@csrf
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="name">名前</label>
				</div>
				<div class="inputItem">
					<input type="text" id="name" name="name" value="{{ old('name') }}" class="textInput" placeholder="例）山田太郎">
					@error('name')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
      <div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="name-kana">フリガナ</label>
				</div>
				<div class="inputItem">
					<input type="text" id="name-kana" name="name-kana" value="{{ old('name-kana') }}" class="textInput" placeholder="例）ヤマダタロウ">
					@error('name-kana')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
      <div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="mail">メールアドレス</label>
				</div>
				<div class="inputItem">
					<input type="email" id="mail" name="mail" value="{{ old('mail') }}" class="textInput" placeholder="例）example@gmail.com">
					@error('mail')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
      <div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="password">パスワード</label>
				</div>
				<div class="inputItem">
					<input type="password" id="password" name="password" value="{{ old('password') }}" class="textInput" placeholder="Password">
					@error('password')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="phone">電話番号</label>
				</div>
				<div class="inputItem">
					<input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="textInput" placeholder="例）000-0000-0000">
					@error('phone')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
      <div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="postcode">郵便番号</label>
				</div>
				<div class="inputItem">
					<input type="text" id="postcode" name="postcode" value="{{ old('postcode') }}" class="textInput" placeholder="例）0000000">
					@error('postcode')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="label" for="prefecture">都道府県</label>
				</div>
				<div class="inputItem">
					<select id="prefecture" name="prefecture" class="select">
            <option value="">選択してください</option>
            @foreach ($prefectures as $key => $prefecture)
              <option value="{{ $key }}" {{ old("prefecture" === $key) }}>{{$prefecture}}</option>
            @endforeach
					</select>
					@error('prefecture')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
      <div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="city">市町村</label>
				</div>
				<div class="inputItem">
					<input type="text" id="city" name="city" value="{{ old('city') }}" class="textInput" placeholder="例）〇〇市〇〇区〇〇町">
					@error('city')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="address_line1">番地・アパート名</label>
				</div>
				<div class="inputItem">
					<input type="text" id="address_line1" name="address_line1" value="{{ old('address_line1') }}" class="textInput" placeholder="例）〇〇丁目〇〇-〇〇 〇〇アパート">
					@error('address_line1')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contentItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="label" for="memo">備考欄</label>
				</div>
				<div class="inputItem">
					<textarea id="memo" name="memo" class="memoText">{{ old('memo') }}</textarea>
					@error('memo')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<button type="submit" class="submitButton">確認する</button>
		</form>
  </div>
</div>

@endsection