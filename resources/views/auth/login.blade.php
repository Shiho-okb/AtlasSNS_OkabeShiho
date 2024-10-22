<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/login', 'method' => 'post']) !!}

  <p class="form-title">AtlasSNSへようこそ</p>

  <div class="form">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('email',null,['class' => 'input']) }}
    {{ Form::label('パスワード') }}
    {{ Form::password('password',['class' => 'input']) }}


    <div class="right">
      {{ Form::submit('ログイン',['class' => 'button']) }}
    </div>

    <p><a href="register">新規ユーザーの方はこちら</a></p>
  </div>

  {!! Form::close() !!}

</x-logout-layout>
