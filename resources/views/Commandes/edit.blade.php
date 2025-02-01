@extends('layouts.app')
@section('title', 'Modifier une Commande')

@section('content')
    <form method="POST" action="{{ route('commandes.update', $commande->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" id="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $commande->client_id == $client->id ? 'selected' : '' }}>
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
                            {{ $commande->produits->contains($produit->id) ? 'checked' : '' }}
                        >
                        <label for="produit_{{ $produit->id }}">{{ $produit->nom }}</label>
                        <input 
                            type="number" 
                            name="produits[{{ $produit->id }}][quantite]" 
                            value="{{ $commande->produits->find($produit->id)->pivot->quantite ?? '' }}"
                            placeholder="Quantité">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="dateCommande" class="form-label">Date commande</label>
            <input type="date" name="dateCommande" class="form-control" id="dateCommande" value="{{ $commande->dateCommande }}" >
        </div>
        

        <div class="mb-3">
            <label for="etat" class="form-label">État</label>
            <select name="etat" id="etat" >
                <option value="realisee" {{ $commande->etat == 'realisee' ? 'selected' : '' }}>Réalisée</option>
                <option value="suivie" {{ $commande->etat == 'suivie' ? 'selected' : '' }}>Suivie</option>
                <option value="confirmee" {{ $commande->etat == 'confirmee' ? 'selected' : '' }}>Confirmée</option>
                <option value="livree" {{ $commande->etat == 'livree' ? 'selected' : '' }}>Livrée</option>
                <option value="annulee" {{ $commande->etat == 'annulee' ? 'selected' : '' }}>Annulée</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
