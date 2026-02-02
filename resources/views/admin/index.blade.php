@extends('layouts.admin_base')
@section('title', $title)
@section('content')
<div class="contentsArea__header">
    <h2 class="contentsArea__header__title">{{$title}}</h2>
</div>
<div class="contentsArea__content">
    <div class="contentsArea__content-inner">
        <ul>
            <li class="registration"><a href="#">アカウント登録</a></li>
            <li><a href="#">アカウント一覧</a></li>
        </ul>
    </div>
</div>
@endsection