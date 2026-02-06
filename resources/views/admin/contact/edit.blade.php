@extends('layouts.admin_base')
@section('title', $title)
@section('content')

{{ Breadcrumbs::render('admin.contact.edit') }}
<div class="contentsArea">
    <div class="contentsArea__header">
        <h2 class="contentsArea__header__title">{{$title}}</h2>
    </div>
    <div class="contentsArea__content">
        <div class="adminTebleArea">
            <table class="teble">
                <thead class="tebleThead">
                    <tr>
                        <th scope="col">ステータス</th>
                        <th scope="col">会社名</th>
                        <th scope="col">氏名</th>
                        <th scope="col">電話番号</th>
                    </tr>
                </thead>
                <tbody class="tebleTbody">
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->status }}</td>
                        <td>{{ $contact->company }}</td>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection