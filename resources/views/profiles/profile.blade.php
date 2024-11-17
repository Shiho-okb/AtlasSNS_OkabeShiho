<x-login-layout>
  <div class="profile-form">
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
        <div>
          {{ Form::label('username', 'ユーザー名', ['class' => 'form-label']) }}
          {{ Form::text('username', $user->username, ['class' => 'input']) }}
        </div>
        <div>
          {{ Form::label('email', 'メールアドレス', ['class' => 'form-label']) }}
          {{ Form::text('email', $user->email, ['class' => 'input']) }}
        </div>
        <div>
          {{ Form::label('password', 'パスワード', ['class' => 'form-label']) }}
          {{ Form::password('password', ['class' => 'input']) }}
        </div>
        <div>
          {{ Form::label('password_confirmation', 'パスワード確認', ['class' => 'form-label']) }}
          {{ Form::password('password_confirmation', ['class' => 'input']) }}
        </div>
        <div>
          {{ Form::label('bio', '自己紹介', ['class' => 'form-label']) }}
          {{ Form::text('bio', $user->bio, ['class' => 'input']) }}
        </div>
        <div>
          {{ Form::label('icon_image', 'アイコン画像', ['class' => 'form-label']) }}
          {{ Form::file('icon_image', ['class' => 'input input-file']) }}
        </div>
      </div>

      <!-- 更新ボタン -->
       <div class="edit-btn">
         <button type="submit"> <!-- type="submit" =クリックするとフォームが送信される -->
           更新
         </button>
       </div>
    </form>
  </div>

</x-login-layout>
