<x-logout-layout>
  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'register']) !!}

  <h2>新規ユーザー登録</h2>

  <div class="form">
    {{-- エラーメッセージの表示 --}}
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- oldで入力保持 -->
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username', old('username'), ['class' => 'input']) }}

    {{ Form::label('メールアドレス') }}
    {{ Form::email('email', old('email'), ['class' => 'input']) }}

    {{ Form::label('パスワード') }}
    {{ Form::password('password', ['class' => 'input']) }}

    {{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation', ['class' => 'input']) }}

    <div class="right">
      {{ Form::submit('新規登録',['class' => 'new-btn button']) }}
    </div>

    <p><a href="login">ログイン画面へ戻る</a></p>
  </div>

  {!! Form::close() !!}
</x-logout-layout>


<style>
  .new-btn {
    margin-top: 10px;
  }
</style>
