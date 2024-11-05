<x-login-layout>

  <div style="display: flex;">
    <h2>フォローリスト</h2>
    <div class="user-icon" style="width: 650px;">
      @foreach($users as $user)
      <a href="{{ url('/another-profile/' . $user->id) }}">
        <img style="margin-left: 10px; margin-bottom: 10px" src="{{ asset('images/' . $user->icon_image) }}" alt="ユーザーアイコン">
      </a>
      @endforeach
    </div>
  </div>

  @foreach($posts as $post)
  <div class="table-wrap">
    <table class="table table-hover">
      <tr>
        <!-- Laravelの制御構文 -->
        <!-- userがPost.php（モデル）に定義したメソッドで、icon_imageがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
        <td>
          <div class="user-icon">
            <a href="{{ url('/another-profile/' . $post->user->id) }}">
              <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="ユーザーアイコン">
            </a>
          </div>
        </td>
        <!-- userがPost.php（モデル）に定義したメソッドで、usernameがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
        <td class="post">
          <p>名前：{{ $post->user->username }}</p>
          <p>投稿内容：{{ $post->post }}</p>
        </td>
        <td>
          <p>{{ $post->created_at }}</p>
        </td>
      </tr>
    </table>
  </div>
  @endforeach

</x-login-layout>
