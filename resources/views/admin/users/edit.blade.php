@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin.users.edit', $title, $user) }}
<div class="contentsArea">
  <div class="contentsArea__header">
    <h2 class="contentsArea__header__title">{{$title}}</h2>
  </div>
  <div class="contentsArea__content">
    <form action="{{ route('admin.users.confirm') }}" method="POST">
			@csrf
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<input type="hidden" name="mode" value="edit" />
      <input type="hidden" name="user_id" value="{{ $user->id }}">
			@include('admin.users._form', ['user' => $user])
			<button type="submit" class="submitButton">確認する</button>
		</form>
  </div>
</div>

@endsection