        <div id="head">
            <h1><a><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p>〇〇さん</p>
                </div>
                <ul>
                    <li><a href="">ホーム</a></li>
                    <li><a href="">プロフィール</a></li>
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
            </div>
        </div>
