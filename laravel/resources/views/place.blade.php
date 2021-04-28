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
        <form action="/delete/place" method="post" id="deleteesta">

            <div class="container">
    
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$establishments->id}}" />
                <button type="submit">Delete</button>
            </div>
        </form>
        <section class="place">
                <h1 class="name">{{$establishments->name}}</h1>
                <h3 class="address">{{$establishments->address}}</h3>
                <h3 class="address">{{$establishments->city}}</h3>
                <h3 class="address">{{$establishments->ZIP_code}}</h3>
                <h3 class="address">{{$establishments->country}}</h3>
        </section>

        <h2>Ajouter un commentaire</h2>
        <form action="/comment" method="POST" id="addestablishment" enctype="multipart/form-data">
            <div class="container">
                {{ csrf_field() }}
                Commentaire :
                
                <input type="text" class="form-controle" id="inputname" name="name">

                <br>
                Note :
                <input type="decimal" class="form-controle" id="inputaddress" name="address">
                
                <br>
                 <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </body>
</html>