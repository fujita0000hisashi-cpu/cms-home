<?php
  return [
    'required' => ':attribute は必須項目です。',
    'custom' => [
      'email' => [
        'unique' => 'このメールアドレスは既に登録されています。'
      ]
    ],
    'attributes' => [
      'name' => '名前',
      'name_kana' => 'フリガナ',
      'email' => 'メールアドレス',
      'password' => 'パスワード',
      'phone' => '電話番号',
      'zipcode' => "郵便番号",
      'prefecture' => '都道府県',
      'city' => '市町村',
      'address' => '番地・アパート名',
      'remarks' => '備考欄'
    ]
  ];