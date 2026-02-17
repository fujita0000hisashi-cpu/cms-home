@extends('layouts.user_base')
@section('title', '送信完了')
@section('content')

<section class="send">
	<div class="contactMainBox">
		<div class="sendMessageBox">
			<p class="sendMassageText">送信完了しました。</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">名前:{{ $user['name'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">フリガナ:{{ $user['name_kana'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">メールアドレス:{{ $user['email'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">パスワード:{{ $user['password'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">電話番号:{{ $user['phone'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">郵便番号:{{ $user['zipcode'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">都道府県:{{ $selectedPrefecture }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">市町村:{{ $user['city'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">番地・アパート名:{{ $user['address'] }}</p>
		</div>
		<div class="dataContentItem">
			<p class="dataContentItemP">備考欄:{{ $user['remarks'] }}</p>
		</div>
		<a href="{{ route('admin.users') }}" class="submitButton">戻る</a>
	</div>
</section>
@endsection