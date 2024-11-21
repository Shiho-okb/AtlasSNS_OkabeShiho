<x-login-layout>

  <div class="post-send-wrap">
    <div class="search-page-head">
      <form action="/search" method="post">
        @csrf
        <input type="text" name="keyword" class="" placeholder="ユーザー名">
        <button type="submit" class="search-button">
          <img src="{{ asset('images/search.png') }}" alt="検索" width="50" height="50">
        </button>

        <!-- 検索ワードが存在する場合に検索ワードを表示 -->
        <!-- != は「異なる」を意味する比較演算子 -->
        @if (!empty($keyword))
        <p>検索ワード: {{ $keyword }}</p>
        @endif
      </form>
    </div>
  </div>

  <div class="user-list">
    <!-- Usersコントローラーから渡された $users の情報をループで展開 -->
    @foreach ($users as $user)
    <table>
      <tr>
        <!-- ユーザーアイコン -->
        <td class="user-item">
          <img src="{{ asset('storage/images/' . $user->icon_image) }}" alt="{{ $user->username }}のアイコン" width="50" height="50">
        </td>
        <!-- ユーザー名 -->
        <td>
          <p>{{ $user->username }}</p>
        </td>

        <!-- フォローボタン・フォロー解除ボタンの切り替え -->
        <td class="follow-button">
          <form action="/toggleFollow/{{ $user->id }}" method="POST">
            @csrf
            <!--「もし、ログインしているユーザーが、他のユーザーをフォローしていれば」-->
            <!-- 現在ログインしているユーザーが特定のユーザー（$user->id）をフォローしているか確認-->
            @if (auth()->user()->isFollowing($user->id))
            <!-- フォロー解除ボタン -->
            <button type="submit" class="btn btn-red">フォロー解除</button>
            @else
            <!-- フォローボタン -->
            <button type="submit" class="btn btn-blue">フォローする</button>
            @endif
          </form>
        </td>
      </tr>
    </table>
    @endforeach
  </div>

</x-login-layout>
