@extends('layouts.app')
@section('title', 'Détails commande ')
@section('content')
    <h3>Informations de la commande</h3>
    <div>
        <h4>La commande a été réalisée le {{$commande['dateCommande']}}</h4>
        <h5>Son état est {{$commande['etat']}}</h5>
        <p>Elle a été faite par {{$commande->client->nom}} {{$commande->client->prenom}}</p>
        <p>Les produits commandés sont: 
            @foreach ($commande->produits as $produit)
                <li>{{ $produit-> nom }} {{ $produit->pivot-> quantite }}</li>
            @endforeach
        </p>

    </div>
    <a href="{{route('commandes.index')}}" class="text-success">Retour</a>
@endsection