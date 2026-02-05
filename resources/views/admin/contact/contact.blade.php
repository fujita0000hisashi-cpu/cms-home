@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin.users', $title) }}
<div class="contentsArea">
    <div class="contentsArea__header">
        <h2 class="contentsArea__header__title">{{$title}}</h2>
    </div>
    <div class="contentsArea__content">
        <div class="adminTebleArea">
            <table class="teble">
                <thead class="tebleThead">
                    <tr>
                        <th scope="col">編集</th>
                        <th scope="col">ステータス</th>
                        <th scope="col">会社名</th>
                        <th scope="col">氏名</th>
                        <th scope="col">電話番号</th>
                    </tr>
                </thead>
                <tbody class="tebleTbody">
                    @foreach($users as $user)
                    <tr>
                        <td><a href="#" class="tableCreateLink">編集</a></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->company }}</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection