<x-logout-layout>
  <div id="clear">
    <!-- view() で渡した変数はBladeテンプレート内で {{-- $変数名 --}} という形で表示できる -->
    <p class="username">{{ $username }}さん</p>
    <p class="welcome">ようこそ！AtlasSNSへ</p>
    <p class="txt-l">ユーザー登録が完了いたしました。</p>
    <p class="txt-l">早速ログインをしてみましょう!</p>

    <div class="center">
      <p class="back-btn button"><a href="login">ログイン画面へ</a></p>
    </div>
  </div>
</x-logout-layout>


<style>
  header {
    margin-top: 6%;
  }

  .username,
  .welcome {
    font-weight: bold;
  }

  .welcome {
    margin-top: 10px;
    margin-bottom: 50px;
  }

  .txt-l {
    text-align: left;
    margin-top: 5px;
  }

  .back-btn {
    margin: 40px auto 20px;
    font-size: 16px;
    line-height: 30px;
  }

  .back-btn a {
    text-decoration: none;
  }
</style>
