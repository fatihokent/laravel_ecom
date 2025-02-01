@extends('layouts.app')
@section('title', 'Ajouter client')
@section('content')
    <form method="POST" action="{{route('clients.store')}}" class="container py-4">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" aria-describedby="nom">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" id="prenom" aria-describedby="prenom">
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="text" name="tel" class="form-control" id="tel" aria-describedby="tel">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection