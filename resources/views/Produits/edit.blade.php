@extends('layouts.app')
@section('title', 'Ajouter client')
@section('content')
    
    <form method="POST" action="/produits/{{$produit['id']}}" class="container py-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" value="{{$produit['nom']}}" class="form-control" id="nom" aria-describedby="nom">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" name="prix" value="{{$produit['prix']}}" class="form-control" id="prix" aria-describedby="prix">
        </div>
        <div class="mb-3">
            <label for="qteStock" class="form-label">Quantité Stock</label>
            <input type="number" name="qteStock" value="{{$produit['qteStock']}}" class="form-control" id="qteStock" aria-describedby="qteStock">
        </div>
        
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
@endsection