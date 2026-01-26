<?php
Breadcrumbs::for('admin', function ($trail) {
  $trail->push('Top', route('admin.index'));
});