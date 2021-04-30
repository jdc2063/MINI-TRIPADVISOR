@extends('layouts.app')

@section('content')
    <section class="body_modify">
        <section class="center_modify">
            <img src="{{$places->image}}" class="image_place">
            <form action="/update/place" method="POST" id="addestablishment" enctype="multipart/form-data">
                <div class="add_etablishment">
                    {{ csrf_field() }}
                    Nom :
                    
                    <input type="text" value="{{$places->name}}"class="form-controle" id="inputname" name="name" required>

                    <br>
                    Adresse :
                    <input type="text" value="{{$places->address}}"class="form-controle" id="inputaddress" name="address" required>
                    
                    <br>

                    Ville :
                    <input type="text" value="{{$places->city}}"class="form-controle" id="inputcity" name="city" required>
                    
                    <br>

                    Code postal :
                    <input type="number"  value="{{$places->ZIP_code}}"class="form-controle" id="inputzip_code" name="ZIP_code" required>
                    
                    <br>
                    Pays :
                    <input type="text" value="{{$places->country}}" class="form-controle" id="inputcountry" name="country" required>

                    <br>
                    Image :
                    <input type="file" class="form-controle" id="inputavatar" name="avatar">
                    <br>
                    <label for="delete_image">Revenir à l'image par défaut</label>
                    <input type="checkbox" id="delete_image" name="delete_image">
                    <br>
                    <input type="hidden" value="{{$places->id}}" class="form-controle" id="inputid" name="id">

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </section>
    </section>
@endsection