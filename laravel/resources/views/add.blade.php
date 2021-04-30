@extends('layouts.app')

@section('content')
        <form action="/place" method="POST" id="addestablishment" enctype="multipart/form-data">
            <div class="add_etablishment">
                {{ csrf_field() }}
                Nom :
                
                <input type="text" class="form-controle" id="inputname" name="name" required>

                <br>
                Adresse :
                <input type="text" class="form-controle" id="inputaddress" name="address" required>
                
                <br>

                Ville :
                <input type="text" class="form-controle" id="inputcity" name="city" required>
                
                <br>

                Code postal :
                <input type="number" class="form-controle" id="inputzip_code" name="ZIP_code" required>
                
                <br>
                Pays :
                <input type="text" class="form-controle" id="inputcountry" name="country" required>

                <br>
                Image :
                <input type="file" class="form-controle" id="inputavatar" name="avatar">
                <br>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
@endsection