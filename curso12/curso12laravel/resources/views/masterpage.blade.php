<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME', 'Laravel') }}</title>
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    LaraSystem
                    <span class="badge badge-secondary">v1.0</span>
                </h3>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>
