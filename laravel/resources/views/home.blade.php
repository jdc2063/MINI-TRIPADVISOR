<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <section class="header">
            <h1>bye</h1>
        </section>
        <section><a href="/place">Créer</a></section>
        <section class="body">
            @foreach ($establishments as $establishments)
                <section class="establishment">
                    <a href="/place/{{$establishments->id}}"><h1 class="name">{{$establishments->name}}</h1>
                    <h3 class="address">{{$establishments->address}}</h3>
                </section>
            @endforeach
        </section>
    </body>
</html>