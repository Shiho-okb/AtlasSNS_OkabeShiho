        <div id="head">
          <h1 class="head-logo"><a href="{{ asset('top') }}"><img src="{{ asset('images/atlas.png') }}"></a></h1>

          <div id="head-info">
            <p>{{ Auth::user()->username }}<span>さん</span></p>
            <!-- 矢印アイコン -->
            <div class="accordion-button"></div>
            <nav class="accordion-menu">
              <ul>
                <li><a href="{{ asset('top') }}">HOME</a></li>
                <li><a href="{{ asset('profile') }}">プロフィール編集</a></li>
                <!-- aタグは自動的にGET送信になるため、POST送信に変更 -->
                <li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    ログアウト
                  </a>
                </li>
              </ul>
            </nav>
            <!-- ユーザーアイコンの表示 -->
            @if (Auth::check()) <!-- ログインしているかチェック -->
            <div class="user-icon acd-user-icon">
              <img src="{{ asset('storage/images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" width="50" height="50">
            </div>
            @endif
          </div>
        </div>
