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

        @auth
            <section class="icon_place">
                <section class="poubelle" style="float:right">
                    <a href="/delete/place/{{$establishments->id}}">a</a>
                </section>
                <section class="stylo" style="float:right">
                    <a href="/update/place/{{$establishments->id}}">a</a>
                </section> 
            </section>
        @endauth
    </section>
    <section class="new_comment">
        @auth
            <h2>Ajouter un commentaire</h2>
            <form action="/comment" method="POST" id="addcomment" enctype="multipart/form-data">
                <div class="container">
                    {{ csrf_field() }}
                    Commentaire (Maximum 1000 charactères):
                    <br>
                    <input type="text" style="width: 90%" maxlength="1000" class="form-controle" id="inputcomment" name="comment" required>

                    <br>
                    Note :
                    <input type="number" min="0" max="5" step="0.1" class="form-controle" id="inputnote" name="note" value="1" required>
                    <br>

                    <input type="hidden"  id="establishment_id" name="establishment_id" value="{{$establishments->id}}">
                    <input type="hidden"  id="establishment_id" name="author" value="{{$auth}}">
                    
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        @else
            <h4>Pour laisser un commentaire, veuillez vous connecter.</h4>
        @endauth
    </section>
    
    @foreach ($comments as $comments)
        <section class="comment">
            <section class="info_comment">
                @foreach ($users as $user)
                    <section class="author"><h3>
                        @if ($user->id === $comments->author)
                            <a href="/user/{{$user->id}}"><span>{{$user->name}}</span></a>
                            @if ($comments->created_at == $comments->updated_at)
                                <span>créer le {{$comments->created_at}}</span>
                            @else
                                <span>modifier le {{$comments->updated_at}}</span>
                            @endif
                        @endif
                    </h3></section>
                @endforeach
                
                <p class="comment_subjet">{{$comments->comment}}</p>
                {{$comments->note}}
            </section>
            <section class="icon_comment">
                @if ($comments->author === $auth)
                    <section class="stylo">
                        <a href="/update/comment/{{$comments->id}}">a</a>
                    </section>    
                    <section class="poubelle">
                        <a href="/delete/comment/{{$comments->id}}">a</a>
                    </section>
                @endif
            </section>
        </section>
    @endforeach

@endsection