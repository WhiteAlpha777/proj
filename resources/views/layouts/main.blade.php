<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<!--
    //<link rel="stylesheet" href="{{ mix('css/app.css') }}">
    //<script src="{{ mix('js/app.js') }}" defer></script>
    -->

    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav>
            <ul><!--
                <li><a href="">Main</a></li>
                <li><a href="</a></li>
                <li><a href="</a></li>
                <li><a href="</a></li> -->
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Панель навигации</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Переключатель навигации">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                       href="{{route('main.index')}}">Main</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about.index')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('contact.index')}}">Contacts</a>
                                </li>
                                @can('view', auth()->user())
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('admin.post.index')}}">AdminPanel</a>
                                    </li>
                                @endcan
                                <li class="nav-item">
                                    <a class="nav-link disabled">Отключенная</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </ul>
        </nav>
    </div>
    @yield('content')
</div>

</body>
</html>
