@extends('layouts.app')
@section('title', 'Ajouter produit')
@section('content')
    <form method="POST" action="{{route('produits.store')}}" class="container py-4">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" aria-describedby="nom">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" name="prix" class="form-control" id="prix" aria-describedby="prix">
        </div>
        <div class="mb-3">
            <label for="qteStock" class="form-label">Quantité Stock</label>
            <input type="number" name="qteStock" class="form-control" id="qteStock" aria-describedby="qteStock">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection