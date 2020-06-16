<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CREANDO PHP - ABM con Laravel+Vue</title>

    <base href="{{url('/')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app" class="content">

        <!--Añadimos nuestro componente vuejs-->
        <example-component></example-component>

    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
