@extends('layouts.app')
@section('title', 'Liste clients')
@section('content')
    <h3>Informations du client</h3>
    <div>
        <h4>Le nom prénom est {{$client['nom']}} {{$client['prenom']}}</h4>
        <h5>L'email est {{$client['email']}}</h5>
        <p>Le tel est {{$client['tel']}}</p>
    </div>
    <a href="{{route('clients.index')}}" class="text-success">Retour</a>
@endsection