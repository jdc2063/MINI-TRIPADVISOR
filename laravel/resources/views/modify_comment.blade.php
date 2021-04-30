@extends('layouts.app')

@section('content')
    <section class="body_place">
           
        
        <section class="place">
            <img src="{{$establishments->image}}" class="image_place">
            <h1 class="name">{{$establishments->name}}</h1>
            <h3 class="address">{{$establishments->address}}</h3>
            <h3 class="address">{{$establishments->city}}</h3>
            <h3 class="address">{{$establishments->ZIP_code}}</h3>
            <h3 class="address">{{$establishments->country}}</h3>
            @if($establishments->note === NULL)
                <h3>Pas de note</h3>
            @else
                <h3 class="note">{{$establishments->note}}</h3>
            @endif
        </section>
    </section>
    <section class="new_comment">
        @auth
            <h2>Modifier votre message</h2>
            <form action="/update/comment" method="POST" id="addestablishment" enctype="multipart/form-data">
                <div class="container">
                    {{ csrf_field() }}
                    Commentaire (Maximum 191 charactères):
                    <br>
                    <input type="text" value="{{$comments->comment}}" size="193" maxlength="191" class="form-controle" id="inputname" name="comment" required>

                    <br>
                    Note :
                    <input type="number" value="{{$comments->note}}" min="0" max="5" step="0.1" class="form-controle" id="inputaddress" name="note" value="1">
                    <br>  
                    <input type="hidden" value="{{$comments->id}}" class="form-controle" id="inputid" name="id">                  
                    
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        @else
            <h4>Pour laisser un commentaire, veuillez vous connecter.</h4>
        @endauth
    </section>
@endsection