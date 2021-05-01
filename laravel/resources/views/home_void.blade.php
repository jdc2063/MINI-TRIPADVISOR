@extends('layouts.app')

@section('content')
    @auth
    <section class="button"><p><a href="/place">Créer</a></p></section>
    @endauth
    
    <section class="center">
        <img src="/images/28479-200.png">
        <h2>Nous n'avons aucun lieu à vous proposer<a href="/pub" class="nav-link">.</a></h2>
    </section>
@endsection