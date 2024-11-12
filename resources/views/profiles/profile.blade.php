<x-login-layout>

  <!-- プロフィール編集フォーム -->
  <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
    @csrf <!-- CSRFトークンを挿入（これがないと、フォームの送信がセキュリティ上ブロックされる）-->

    <!-- ユーザーアイコンの表示 -->
    @if (Auth::check()) <!-- ログインしているかチェック -->
    <div class="user-icon">
      <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" width="50" height="50">
    </div>
    @endif

    <div class="form">
      {{ Form::label('ユーザー名') }}
      {{ Form::text('username', $user->username, ['class' => 'input']) }}

      {{ Form::label('メールアドレス') }}
      {{ Form::text('email', $user->email, ['class' => 'input']) }}

      {{ Form::label('パスワード') }}
      {{ Form::password('password', ['class' => 'input']) }}

      {{ Form::label('パスワード確認') }}
      {{ Form::password('password_confirmation', ['class' => 'input']) }}

      {{ Form::label('自己紹介') }}
      {{ Form::text('bio', $user->bio, ['class' => 'input']) }}

      {{ Form::label('アイコン画像') }}
      {{ Form::file('icon_image', ['class' => 'input']) }}
    </div>

    <!-- 更新ボタン -->
    <button type="submit"> <!-- type="submit" =クリックするとフォームが送信される -->
      更新
    </button>
  </form>

</x-login-layout>


<style>
  label {
    display: block;
  }
</style>
