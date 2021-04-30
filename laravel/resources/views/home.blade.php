@extends('layouts.app')

@section('content')
    @auth
    <section class="button"><p><a href="/place">Créer</a></p></section>
    @endauth
    
    <section class="body_home">
        @foreach ($establishments as $establishments)
            <a href="/place/{{$establishments->id}}">
                <section class="establishment">
                    @if ($establishments->image == "/images/icons8-house-52.png")
                        <img class="default_image" src="{{$establishments->image}}">
                    @else
                        <img class="image" src="{{$establishments->image}}">
                    @endif
                    
                    <section class="info">
                        <h1 class="name">{{$establishments->name}}</h1>
                        <h3 class="address">{{$establishments->address}}</h3>
                        @if($establishments->note === NULL)
                            <h4>Pas de note</h4>
                        @else
                            <h4 class="note">{{$establishments->note}}</h4>
                        @endif
                    </section>
                </section>
            </a>
        @endforeach
    </section>
@endsection