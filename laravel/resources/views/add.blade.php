
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
        <form action="/place" method="POST" id="addestablishment" enctype="multipart/form-data">
            <div class="container">
                {{ csrf_field() }}
                Nom :
                
                <input type="text" class="form-controle" id="inputname" name="name">

                <br>
                Adresse :
                <input type="text" class="form-controle" id="inputaddress" name="address">
                
                <br>

                Ville :
                <input type="text" class="form-controle" id="inputcity" name="city">
                
                <br>

                Code postal :
                <input type="text" class="form-controle" id="inputzip_code" name="ZIP_code">
                
                <br>
                Pays :
                <input type="text" class="form-controle" id="inputcountry" name="country">

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </body>
</html>