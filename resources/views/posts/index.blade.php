<x-login-layout>

  <!-- ユーザーアイコンの表示 -->
  @if (Auth::check()) <!-- ログインしているかチェック -->
  <div class="user-icon">
    <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" width="50" height="50">
  </div>
  @endif

  <!-- 投稿フォーム -->
  <form action="/post/create" method="post">
    @csrf <!-- CSRFトークンの生成（これがないと、フォームの送信がセキュリティ上ブロックされる）-->

    <textarea name="post" id="request-about" placeholder="投稿内容を入力してください"></textarea>

    <!-- 投稿ボタン -->
    <div class="submit-button">
      <button type="submit"> <!-- type="submit" =クリックするとフォームが送信される -->
        <img src="{{ asset('images/post.png') }}" alt="投稿" width="50" height="50">
      </button>
    </div>
  </form>

  <!-- foreachを使って繰り返し処理を行い画面に表示 -->
  @foreach ($posts as $post)
  <!-- レイアウト：それぞれのtdタグにwidthで%指定 -->
  <table class="table table-hover">
    <tr>
      <!-- Laravelの制御構文 -->
      <!-- userがPost.php（モデル）に定義したメソッドで、icon_imageがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
      <td>
        <div><img src="{{ asset('images/' . $post->user->icon_image) }}" alt="ユーザーアイコン"></div>
      </td>
      <!-- userがPost.php（モデル）に定義したメソッドで、usernameがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
      <td>
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      </td>

      <!-- if文でボタンの出しわけをこのファイルでします -->
      <!-- レイアウト：それぞれのtdタグにwidthで%指定 -->
      <td class="submit-button">
        <p>{{ $post->created_at }}</p>

        <!-- 投稿編集ボタン -->
        <!-- このボタンを押下するとモーダル画面が開く（データの送信などはしない） -->
        <!-- 編集ボタンにpost属性とpost_id属性を追加し、それぞれの投稿内容と投稿idのデータをモーダルの中身に送る -->
        <!-- 例：「こんにちは」と投稿された投稿に設置されている編集ボタンではpost=”こんにちは”となる -->
        <button type="button" class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}">
          <img src="{{ asset('images/edit.png') }}" alt="投稿編集" width="50" height="50">
        </button>

        <!-- 投稿削除ボタン -->
        <!-- 移動先のURL指定にpostテーブル内の各リストのID番号を設置 -->
        <form action="/post/{{$post->id}}/delete" method="post">
          @csrf <!-- CSRFトークンを追加 -->
          <!-- type="submit" =クリックするとフォームが送信される -->
          <!-- onclick属性 ＝削除を行っていいかを確認するモーダル画面が表示されるように設定-->
          <button class="delete-button" type="submit" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
            <img src="{{ asset('images/trash.png') }}" alt="投稿削除" width="50" height="50">
          </button>
        </form>
      </td>

      <!-- if文でボタンの出しわけをこのファイルでします -->

    </tr>
  </table>
  @endforeach

  <!-- モーダルの中身をここに記載 -->
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      <!-- formタグのaction属性はJSで自動的に設定する -->
      <form id="modal-form" method="post">
        <!-- 編集用テキストエリア -->
        <textarea name="post" class="modal_post"></textarea>
        <!-- 隠しフィールドに投稿IDをセット -->
        <input type="hidden" name="post_id" class="modal_id" value="編集">
        <!-- 投稿ボタン -->
        <button type="submit"> <!-- type="submit" =クリックするとフォームが送信される -->
          <img src="{{ asset('images/edit.png') }}" alt="投稿" width="50" height="50">
        </button>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
  <!-- モーダルの中身をここに記載 -->

</x-login-layout>
