<x-login-layout>

  <div class="user-list">
    <!-- Usersコントローラーから渡された $users の情報をループで展開 -->
    @foreach ($users as $user)
    <table>
      <tr>
        <!-- ユーザーアイコン -->
        <td class="user-item">
          <img src="{{ asset('images/' . $user->icon_image) }}" alt="{{ $user->username }}のアイコン" width="50" height="50">
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
            <button type="submit" class="btn btn-danger">フォロー解除</button>
            @else
            <!-- フォローボタン -->
            <button type="submit" class="btn btn-info">フォローする</button>
            @endif
          </form>
        </td>
      </tr>
    </table>
    @endforeach
  </div>

</x-login-layout>
