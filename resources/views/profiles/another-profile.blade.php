<x-login-layout>

  <div class="user-list">
    <!-- Usersコントローラーから渡された $users の情報をループで展開 -->
    <table>
      <tr>
        <!-- Laravelの制御構文 -->
        <!-- userがPost.php（モデル）に定義したメソッドで、icon_imageがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
        <td>
          <div class="user-icon"><img src="{{ asset('images/' . $user->icon_image) }}" alt="ユーザーアイコン"></div>
        </td>
        <!-- userがPost.php（モデル）に定義したメソッドで、usernameがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
        <td>
          <p><span>ユーザー名</span>{{ $user->username }}</p>
          <p><span>自己紹介</span>{{ $user->bio }}</p>
        </td>

        <!-- フォローボタン・フォロー解除ボタンの切り替え -->
        <td class="follow-button">
          <form action="/toggleFollow/{{ $user->id }}" method="POST">
            @csrf
            <!--「もし、ログインしているユーザーが、他のユーザーをフォローしていれば」-->
            <!-- 現在ログインしているユーザーが特定のユーザー（$user->id）をフォローしているか確認-->
            @if (auth()->user()->isFollowing($user->id))
            <!-- フォロー解除ボタン -->
            <button type="submit" class="btn btn-danger">フォロー解除</button>
            @else
            <!-- フォローボタン -->
            <button type="submit" class="btn btn-info">フォローする</button>
            @endif
          </form>
        </td>
      </tr>
    </table>
  </div>

  @foreach($posts as $post)
  <div class="table-wrap">
    <table class="table table-hover">
      <tr>
        <!-- Laravelの制御構文 -->
        <!-- userがPost.php（モデル）に定義したメソッドで、icon_imageがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
        <td>
          <div class="user-icon"><img src="{{ asset('images/' . $post->user->icon_image) }}" alt="ユーザーアイコン"></div>
        </td>
        <!-- userがPost.php（モデル）に定義したメソッドで、usernameがテーブルのカラム名(Postsテーブルと紐づいているユーザー名が表示される) -->
        <td class="post">
          <p>{{ $post->user->username }}</p>
          <p>{{ $post->post }}</p>
        </td>
        <td>
          <p>{{ $post->created_at }}</p>
        </td>
      </tr>
    </table>
  </div>
  @endforeach

</x-login-layout>
