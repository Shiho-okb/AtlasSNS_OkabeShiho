<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p>{{ Auth::user()->username }}さんの</p>
        <div>
          <p>フォロー数</p>
          <p>{{ Auth::user()->followings()->count() }}名</p>
        </div>
        <p class="btn"><a href="follow-list">フォローリスト</a></p>
        <div>
          <p>フォロワー数</p>
          <p>{{ Auth::user()->followers()->count() }}名</p>
        </div>
        <p class="btn"><a href="follower-list">フォロワーリスト</a></p>
      </div>
      <p class="btn"><a href="search">ユーザー検索</a></p>
    </div>
  </div>
  <footer>
  </footer>
  <!-- jQueryの読み込み -->
  <script src="{{ asset('js/jquery.min.js') }}"></script> <!-- jQueryのローカルファイル、もしくはCDNでも可 -->
  <!-- app.jsの読み込み -->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- モーダル機能のためのJavaScriptファイルの読み込み -->
  <script src="{{ asset('js/script.js') }}"></script> <!-- public/js配下にあるscript.jsファイルを読み込む -->
</body>

</html>
