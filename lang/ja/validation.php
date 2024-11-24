<?php

return [

    /*
    |--------------------------------------------------------------------------
    | バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | 以下の言語行は、バリデータクラスで使用されるデフォルトのエラーメッセージです。
    | サイズルールのように複数バージョンが存在するルールもあります。
    | 必要に応じて、これらのメッセージを自由に変更してください。
    |
    */

    'accepted' => ':attributeを承認する必要があります。',
    'accepted_if' => ':otherが:valueの場合、:attributeを承認する必要があります。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeには:date以降の日付を指定してください。',
    'after_or_equal' => ':attributeには:date以降または同日の日付を指定してください。',
    'alpha' => ':attributeには文字のみを含めることができます。',
    'alpha_dash' => ':attributeには文字、数字、ダッシュ、アンダースコアのみを含めることができます。',
    'alpha_num' => ':attributeには文字と数字のみを含めることができます。',
    'array' => ':attributeには配列を指定してください。',
    'ascii' => ':attributeには半角英数字と記号のみを含めることができます。',
    'before' => ':attributeには:date以前の日付を指定してください。',
    'before_or_equal' => ':attributeには:date以前または同日の日付を指定してください。',
    'between' => [
        'array' => ':attributeの項目数は:minから:maxの間で指定してください。',
        'file' => ':attributeのファイルサイズは:minから:max KBの間で指定してください。',
        'numeric' => ':attributeの値は:minから:maxの間で指定してください。',
        'string' => ':attributeの文字数は:minから:maxの間で指定してください。',
    ],
    'boolean' => ':attributeにはtrueまたはfalseを指定してください。',
    'confirmed' => ':attributeの確認が一致しません。',
    'current_password' => '現在のパスワードが正しくありません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeには:dateと同じ日付を指定してください。',
    'date_format' => ':attributeは:format形式と一致していません。',
    'decimal' => ':attributeには:decimal桁の小数を指定してください。',
    'declined' => ':attributeを辞退する必要があります。',
    'declined_if' => ':otherが:valueの場合、:attributeを辞退する必要があります。',
    'different' => ':attributeと:otherには異なる値を指定してください。',
    'digits' => ':attributeは:digits桁である必要があります。',
    'digits_between' => ':attributeは:min桁から:max桁の間で指定してください。',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeには重複した値を含めることはできません。',
    'doesnt_end_with' => ':attributeは次のいずれかで終わることはできません: :values。',
    'doesnt_start_with' => ':attributeは次のいずれかで始めることはできません: :values。',
    'email' => ':attributeは有効なメールアドレスである必要があります。',
    'ends_with' => ':attributeは次のいずれかで終わる必要があります: :values。',
    'enum' => '選択された:attributeは無効です。',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルである必要があります。',
    'filled' => ':attributeには値を指定する必要があります。',
    'gt' => [
        'array' => ':attributeの項目数は:valueを超える必要があります。',
        'file' => ':attributeのファイルサイズは:value KBを超える必要があります。',
        'numeric' => ':attributeの値は:valueを超える必要があります。',
        'string' => ':attributeの文字数は:valueを超える必要があります。',
    ],
    'gte' => [
        'array' => ':attributeの項目数は:value以上である必要があります。',
        'file' => ':attributeのファイルサイズは:value KB以上である必要があります。',
        'numeric' => ':attributeの値は:value以上である必要があります。',
        'string' => ':attributeの文字数は:value以上である必要があります。',
    ],
    'image' => ':attributeには画像を指定してください。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeが:otherに存在しません。',
    'integer' => ':attributeには整数を指定してください。',
    'ip' => ':attributeには有効なIPアドレスを指定してください。',
    'ipv4' => ':attributeには有効なIPv4アドレスを指定してください。',
    'ipv6' => ':attributeには有効なIPv6アドレスを指定してください。',
    'json' => ':attributeには有効なJSON文字列を指定してください。',
    'lowercase' => ':attributeは小文字である必要があります。',
    'lt' => [
        'array' => ':attributeの項目数は:value未満である必要があります。',
        'file' => ':attributeのファイルサイズは:value KB未満である必要があります。',
        'numeric' => ':attributeの値は:value未満である必要があります。',
        'string' => ':attributeの文字数は:value未満である必要があります。',
    ],
    'lte' => [
        'array' => ':attributeの項目数は:value以下である必要があります。',
        'file' => ':attributeのファイルサイズは:value KB以下である必要があります。',
        'numeric' => ':attributeの値は:value以下である必要があります。',
        'string' => ':attributeの文字数は:value以下である必要があります。',
    ],
    'mac_address' => ':attributeには有効なMACアドレスを指定してください。',
    'max' => [
        'array' => ':attributeの項目数は:max以下である必要があります。',
        'file' => ':attributeのファイルサイズは:max KB以下である必要があります。',
        'numeric' => ':attributeの値は:max以下である必要があります。',
        'string' => ':attributeの文字数は:max以下である必要があります。',
    ],
    'max_digits' => ':attributeには:max桁以下の数字を指定してください。',
    'mimes' => ':attributeには次のファイルタイプを指定してください: :values。',
    'mimetypes' => ':attributeには次のファイルタイプを指定してください: :values。',
    'min' => [
        'array' => ':attributeの項目数は少なくとも:min必要です。',
        'file' => ':attributeのファイルサイズは少なくとも:min KBである必要があります。',
        'numeric' => ':attributeの値は少なくとも:minである必要があります。',
        'string' => ':attributeの文字数は少なくとも:min文字である必要があります。',
    ],
    'min_digits' => ':attributeには少なくとも:min桁の数字を指定してください。',
    'missing' => ':attributeが不足しています。',
    'missing_if' => ':otherが:valueの場合、:attributeが不足しています。',
    'missing_unless' => ':otherが:valueでない場合、:attributeが不足しています。',
    'missing_with' => ':valuesが存在する場合、:attributeが不足しています。',
    'missing_with_all' => ':valuesがすべて存在する場合、:attributeが不足しています。',
    'multiple_of' => ':attributeは:valueの倍数である必要があります。',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeを英数字にしてください。',
    'numeric' => ':attributeには数字を指定してください。',
    'password' => [
        'letters' => ':attributeには少なくとも1文字を含める必要があります。',
        'mixed' => ':attributeには大文字と小文字を少なくとも1つずつ含める必要があります。',
        'numbers' => ':attributeには少なくとも1つの数字を含める必要があります。',
        'symbols' => ':attributeには少なくとも1つの記号を含める必要があります。',
        'uncompromised' => '指定された:attributeはデータ漏洩で使用されています。別の:attributeを選択してください。',
    ],
    'present' => ':attributeが存在する必要があります。',
    'prohibited' => ':attributeは使用できません。',
    'prohibited_if' => ':otherが:valueの場合、:attributeは使用できません。',
    'prohibited_unless' => ':otherが:valuesに含まれない場合、:attributeは使用できません。',
    'prohibits' => ':attributeは:otherの存在を禁止します。',
    'regex' => ':attributeを英数字にしてください。',
    'required' => ':attributeは必須です。',
    'required_array_keys' => ':attributeには次のキーを含める必要があります: :values。',
    'required_if' => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless' => ':otherが:valuesに含まれない場合、:attributeは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeは必須です。',
    'required_with_all' => ':valuesがすべて存在する場合、:attributeは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeは必須です。',
    'required_without_all' => ':valuesがすべて存在しない場合、:attributeは必須です。',
    'same' => ':attributeと:otherは一致する必要があります。',
    'size' => [
        'array' => ':attributeには:size項目を含める必要があります。',
        'file' => ':attributeのファイルサイズは:size KBである必要があります。',
        'numeric' => ':attributeの値は:sizeである必要があります。',
        'string' => ':attributeの文字数は:size文字である必要があります。',
    ],
    'starts_with' => ':attributeは次のいずれかで始まる必要があります: :values。',
    'string' => ':attributeには文字列を指定してください。',
    'timezone' => ':attributeには有効なタイムゾーンを指定してください。',
    'unique' => ':attributeはすでに存在します。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'uppercase' => ':attributeは大文字である必要があります。',
    'url' => ':attributeは有効なURLである必要があります。',
    'ulid' => ':attributeは有効なULIDである必要があります。',
    'uuid' => ':attributeは有効なUUIDである必要があります。',

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション言語行
    |--------------------------------------------------------------------------
    |
    | ここでは、カスタムバリデーションルールのためのメッセージを指定できます。
    | '属性名.ルール名'の形式でメッセージを作成することで、特定の属性に
    | カスタムメッセージを迅速に設定できます。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'カスタムメッセージ',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性
    |--------------------------------------------------------------------------
    |
    | 以下の言語行は、属性プレースホルダをユーザーフレンドリーな
    | 名前に置き換えるために使用されます。これにより、
    | メッセージをより読みやすくすることができます。
    |
    */

    'attributes' => [
        'username' => 'ユーザー名',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'post' => '投稿内容',
    ],

];
