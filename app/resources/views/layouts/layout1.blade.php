<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'マッチングサービス') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .no-wrap {
            white-space: nowrap;
            /* 折り返さない */
        }

        .large-text {
            font-size: 1.5rem;
            /* フォントサイズを大きく設定 */
        }

        .space {
            margin-right: 2rem;
            /* スペースを調整 */
        }

        .nav-card {
            padding: 20px;
            /* 内側の余白 */
            border-radius: 10px;
            /* 角を丸く */
        }

        .narrow-table {
            max-width: 600px;
            /* テーブルの最大幅を設定 */
            margin: auto;
            /* 中央寄せ */
        }

        .custom-hr {
            border-top: 2px solid black;
            /* 線の太さと色を変更 */
            margin: 20px 0;
            /* 上下のマージン */
        }
    </style>
    @yield('stylesheet')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    マッチング
                </a>
            </div>
            <div class="my-navbar-control">
                <!-- Authのcheckメソッドはログイン状態でtrueを返す -->
                <!-- ログイン状態によってヘッダーに表示するメニューを出し分けています。 -->
                @if(Auth::check())
                <span class="my-navbar-item">{{ Auth::user()->name }}</span>
                /
                <a href="" class="my-navbar-item">マイページ</a>
                /
                <a href="" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
                <script>
                    document.getElementById('logout').addEventListener('click', function(event) {
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                    });
                </script>
                @else
                <a class="my-navbar-item" href="{{ route('login') }}">ログインしてない</a>
                /
                <a class="my-navbar-item" href="{{ route('register') }}">新規登録</a>
                @endif
            </div>

        </nav>
        @yield('content')
    </div>
</body>

</html>