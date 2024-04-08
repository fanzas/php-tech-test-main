<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body style="background: #eefdff">
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li @class([ 'nav-item' , 'active'=> request()->is('posts')
                        ])>
                        <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                    </li>
                    <li @class(['nav-item', 'active'=> request()->is('posts/create')])
                        >
                        <a class="nav-link" href="{{route('posts.create')}}">
                            New Post
                        </a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav">
                        @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        @else

                        <span>Hello {{ Auth::user()->name }}!</span>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

</body>

</html>