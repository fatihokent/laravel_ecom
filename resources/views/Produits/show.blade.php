@extends('layouts.app')
@section('title', 'Détails produit ')
@section('content')
    <h3>Informations du produit</h3>
    <div>
        <h4>Le nom du produit est {{$produit['nom']}}</h4>
        <h5>Le prix de l'unité est {{$produit['prix']}}</h5>
        <p>La quantité dans le stock {{$produit['qteStock']}}</p>
    </div>
    <a href="{{route('produits.index')}}" class="text-success">Retour</a>
@endsection