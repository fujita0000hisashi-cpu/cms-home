<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
Breadcrumbs::for('admin', function ($trail) {
  $trail->push('Top', route('admin.index'));
});

Breadcrumbs::for('admin.users', function ($trail) {
  $trail->parent('admin');
  $trail->push('アカウント一覧', route('admin.users'));
});