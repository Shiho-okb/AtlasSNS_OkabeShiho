<x-logout-layout>
  <div id="clear">
    <!-- view() で渡した変数はBladeテンプレート内で {{-- $変数名 --}} という形で表示できる -->
    <p>{{ $username }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>

    <p class="btn"><a href="login">ログイン画面へ</a></p>
  </div>
</x-logout-layout>
