<?php
  return [
    'required' => ':attribute は必須項目です。',
    'custom' => [
      'mail' => [
        'unique' => 'このメールアドレスは既に登録されています。'
      ]
    ],
    'attributes' => [
      'name' => '名前',
      'name_kana' => 'フリガナ',
      'mail' => 'メールアドレス',
      'password' => 'パスワード',
      'phone' => '電話番号',
      'postcode' => "郵便番号",
      'prefecture' => '都道府県',
      'city' => '市町村',
      'address_line1' => '番地・アパート名',
      'memo' => '備考欄'
    ]
  ];