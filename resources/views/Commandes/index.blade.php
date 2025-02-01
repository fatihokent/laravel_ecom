@extends('layouts.app')
@section('title', 'Liste des Commandes')

@section('content')
    <h3>Liste des Commandes</h3>
    <table class="table mt-3 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Date</th>
                <th>État</th>
                <th>Produits commandés</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->client->nom }} {{ $commande->client->prenom }}</td>
                    <td>{{ $commande->dateCommande }}</td>
                    <td>{{ $commande->etat }}</td>
                    <td>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-primary">Nom</th>
                                        <th class="text-primary">Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($commande->produits as $produit)
                                        <tr>
                                           <td>{{ $produit-> nom }}</td>
                                           <td>{{ $produit->pivot-> quantite }}</td> 
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        
                    </td>
                    <td>
                        <a href="{{ route('commandes.facture', $commande->id) }}" target="_blank" class="btn btn-primary"><i class="bi bi-printer"></i></a>
                        <a href="{{ route('commandes.show', $commande->id) }}" class="btn btn-success"><i class="bi bi-search"></i></a>
                        <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('commandes.create') }}" class="btn btn-info">Créer une Commande</a>

@endsection
