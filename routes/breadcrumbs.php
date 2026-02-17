<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
  $trail->push('Top', route('admin.index'));
});

Breadcrumbs::for('admin.users', function (BreadcrumbTrail $trail) {
  $trail->parent('admin');
  // $trail->push($title, route('admin.users'));
  $trail->push('アカウント一覧', route('admin.users'));
});

Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail, $title) {
  $trail->parent('admin.users');
  $trail->push($title, route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, $title, $user) {
  $trail->parent('admin.users');
  $trail->push($title, route('admin.users.edit', ['id' => $user->id]));
});


Breadcrumbs::for('admin.contact', function (BreadcrumbTrail $trail) {
  $trail->parent('admin');
  $trail->push('お問い合わせ一覧', route('admin.contact.index'));
});

Breadcrumbs::for('admin.contact.edit', function (BreadcrumbTrail $trail) {
  $trail->parent('admin.contact');
  $trail->push('お問い合わせ詳細');
});