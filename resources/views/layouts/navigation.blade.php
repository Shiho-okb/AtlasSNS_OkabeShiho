        <div id="head">
          <h1 class="head-logo"><a href="top"><img src="images/atlas.png"></a></h1>

          <div id="head-info">
            <p>{{ Auth::user()->username }}さん</p>
            <!-- 矢印アイコン -->
            <div class="accordion-button"></div>
            <nav class="accordion-menu">
              <ul>
                <li><a href="top">HOME</a></li>
                <li><a href="profile">プロフィール編集</a></li>
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
          </div>
        </div>
