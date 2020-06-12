<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <h1 class="display-1">
                    Laravel
                </h1>

                <table class="table">
                    <tbody>
                        <tr>
                            <td><a class="btn btn-primary" href="https://laravel.com/docs">
                                <i class="fa fa-eye"></i>
                                Docs
                            </a></td>
                            <td><a class="btn btn-secondary" href="https://laracasts.com">
                                <i class="fa fa-car"></i>
                                Laracasts
                            </a></td>
                            <td><a class="btn btn-success" href="https://laravel-news.com">
                                <i class="fa fa-edit"></i>
                                News
                            </a></td>
                            <td><a class="btn btn-warning" href="https://blog.laravel.com">
                                <i class="fa fa-recycle"></i>
                                Blog
                            </a></td>
                            <td><a class="btn btn-info" href="https://nova.laravel.com">
                                <i class="fa fa-crop"></i>
                                Nova
                            </a></td>
                            <td><a class="btn btn-danger" href="https://forge.laravel.com">
                                <i class="fa fa-cut"></i>
                                Forge
                            </a></td>
                            <td><a class="btn btn-light" href="https://github.com/laravel/laravel">
                                <i class="fa fa-bus"></i>
                                GitHub
                            </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
