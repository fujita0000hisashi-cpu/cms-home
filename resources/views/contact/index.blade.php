@extends('layouts.user_base')
@section('title', 'お問い合わせ')
@section('content')
<section class="contact">
	<div class="contactMainBox">
		<form action="{{ route('contact.confirm') }}" method="POST">
			@csrf
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="contactItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="company">会社名</label>
				</div>
				<div class="inputItem">
					<input type="text" id="company" name="company" value="{{ old('company') }}" class="textInput" placeholder="例）株式会社〇〇">
					@error('company')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contactItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="name">氏名</label>
				</div>
				<div class="inputItem">
					<input type="text" id="name" name="name" value="{{ old('name') }}" class="textInput" placeholder="例）山田太郎">
					@error('name')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contactItem">
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
			<div class="contactItem">
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
			<div class="contactItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="" for="birthday">生年月日</label>
				</div>
				<div class="inputItem dateInput">
					<input type="data" id="birthday" name="birthday" value="{{ old('birthday') }}" class="textInput" placeholder="例）1992-01-01">
					@error('birthday')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contactItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="label" for="sex">性別</label>
				</div>
				<div class="inputItem">
					<input id="male" type="radio" name="sex" value="男"><label for="male">男</label>
					<input id="female" type="radio" name="sex" value="女"><label for="female">女</label>
					@error('sex')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contactItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="label" for="job">職業</label>
				</div>
				<div class="inputItem">
					<select id="job" name="job" class="select">
						<option value="">選択してください</option>
						<option value="会社員（正社員）">会社員（正社員）</option>
						<option value="パート・アルバイト">パート・アルバイト</option>
					</select>
					@error('job')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<div class="contactItem">
				<div class="textItem">
					<span class="required">必須</span>
					<label class="label" for="contact">お問い合わせ内容</label>
				</div>
				<div class="inputItem">
					<textarea id="contact" name="contact" class="contactText"></textarea>
					@error('contact')
            <span class="errorMessage">{{ $message }}</span>
          @enderror
				</div>
			</div>
			<button type="submit" class="submitButton">確認する</button>
		</form>
	</div>
</section>
@endsection