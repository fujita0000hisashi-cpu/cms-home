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
            <div>
                <h3 class="contentsArea__content__title">アカウント登録</h3>
                <div class="contentsArea__content__link"><a href="/users">アカウント一覧</a></div>
            </div>
            <div>
                <h3 class="contentsArea__content__title">お問い合わせ情報</h3>
                <div class="contentsArea__content__link"><a href="/admin/contact">お問い合わせ一覧</a></div>
            </div>
        </div>
    </div>
</div>
@endsection