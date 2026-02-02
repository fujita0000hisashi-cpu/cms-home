@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin') }}
<div class="contentsArea">
    <div class="contentsArea__header">
        <h2 class="contentsArea__header__title">管理画面TOP</h2>
    </div>
    <div class="contentsArea__content">
        <div class="contentsArea__content-inner">
            <ul>
                <li class="registration"><a href="#">アカウント登録</a></li>
                <li><a href="#">アカウント一覧</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection