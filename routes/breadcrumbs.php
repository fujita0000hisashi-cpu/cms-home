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