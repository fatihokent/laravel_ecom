@extends('layouts.app')
@section('title', 'Créer une Commande')

@section('content')
    <form method="POST" action="{{ route('commandes.store') }}">
        @csrf
        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" id="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="produits" class="form-label">Produits</label>
            <div id="produits">
                @foreach ($produits as $produit)
                    <div class="form-check">
                        <input 
                            type="checkbox" 
                            name="produits[{{ $produit->id }}][id]" 
                            value="{{ $produit->id }}" 
                            id="produit_{{ $produit->id }}" 
                        >
                        <label for="produit_{{ $produit->id }}">{{ $produit->nom }}</label>
                        <input 
                            type="number" 
                            name="produits[{{ $produit->id }}][quantite]" 
                            placeholder="Quantité">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="dateCommande" class="form-label">Date commande</label>
            <input type="date" name="dateCommande" class="form-control" id="dateCommande" >
        </div>

        <div class="mb-3">
            <label for="etat" class="form-label">État</label>
            <select name="etat" id="etat" >
                <option value="realisee">Réalisée</option>
                <option value="suivie">Suivie</option>
                <option value="confirmee">Confirmée</option>
                <option value="livree">Livrée</option>
                <option value="annulee">Annulée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
