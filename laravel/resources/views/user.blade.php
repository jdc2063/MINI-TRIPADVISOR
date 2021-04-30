@extends('layouts.app')

@section('content')
    <section class="body_place">
        <section class="place">
            <img src="{{$users->image}}" class="image_place">
            <section class="information_user">
                <h3>Nom: {{$users->name}}</h3>
                <h3>Email: {{$users->email}}</h3>
            </section>
        </section>
        @if (auth()->user()->id == $users->id)
            <section class="icon_place">
                <section class="stylo" style="float:right">
                    <a href="/update/user/{{$users->id}}">a</a>
                </section> 
            </section>
        @endif
    </section>
@endsection