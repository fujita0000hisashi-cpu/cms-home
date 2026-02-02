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
    
  </div>
</div>

@endsection