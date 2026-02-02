@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin.users', $title) }}
<div class="contentsArea">
    <div class="contentsArea__header">
        <h2 class="contentsArea__header__title">{{$title}}</h2>
        <ul class="contentsArea__header__btnArea">
            <li><a href="#">新規登録</a></li>
        </ul>
    </div>
    <div class="contentsArea__content">
        <div class="adminTebleArea">
            <table class="teble">
                <thead class="tebleThead">
                    <tr>
                        <th scope="col">編集</th>
                        <th scope="col">名前</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">電話番号</th>
                        <th scope="col">都道府県</th>
                        <th scope="col">市町村</th>
                        <th scope="col">番地・アパート名</th>
                    </tr>
                </thead>
                <tbody class="tebleTbody">
                    @foreach($users as $user)
                    <tr>
                        
                        <td><a href="#" class="tableCreateLink">編集</a></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->prefecture }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection