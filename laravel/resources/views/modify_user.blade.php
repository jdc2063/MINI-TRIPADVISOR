@extends('layouts.app')

@section('content')
    <section class="body_modify">
        <section class="center_modify">
            <img src="{{$users->image}}" class="image_place">
            <form action="/update/user" method="POST" id="addestablishment" enctype="multipart/form-data">
                <div class="add_etablishment">
                    {{ csrf_field() }}
                    Nom :
                    
                    <input type="text" value="{{$users->name}}"class="form-controle" id="inputname" name="name" required>

                    <br>
                    Adresse :
                    <input type="email" value="{{$users->email}}"class="form-controle" id="inputaddress" name="email" required>
                    
                    <br>

                    
                    Image :
                    <input type="file" class="form-controle" id="inputavatar" name="avatar">
                    <br>
                    <label for="delete_image">Revenir à l'image par défaut</label>
                    <input type="checkbox" id="delete_image" name="delete_image">
                    <br>
                    <input type="hidden" value="{{$users->id}}" class="form-controle" id="inputid" name="id">

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </section>
    </section>
@endsection