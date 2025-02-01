<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //
    public function index(){ 
        $commandes = Commande::all();
        return View ("commandes.index", compact('commandes'));
    }
    
    public function show ($id){
        $commande = Commande::find($id);
        return View ("commandes.show", compact('commande'));
    }

    public function create(){
        $clients = Client::all();
        $produits = Produit::all();
        return View ("commandes.create", compact('clients', 'produits'));
    }
    
    public function store(Request $request){
        $dateCommande = date('Y-m-d', strtotime($request->dateCommande));

        $commande = Commande::create([
            'dateCommande' => $dateCommande,
            'etat' => $request->etat,
            'client_id' => $request->client_id,
        ]);

        foreach ($request->produits as $produit) {
            if (is_array($produit) && isset($produit['id']) && !is_null($produit['quantite'])) {
                $commande->produits()->attach($produit['id'], ['quantite' => $produit['quantite']]);
            }
        }        

        return redirect()->route ('commandes.index');
    }

    public function edit ($id){
        $commande = Commande::find($id);
        $clients = Client::all();
        $produits = Produit::all();
        return View ("commandes.edit", compact('commande', 'clients', 'produits'));
    }

    public function update (Request $request, $id){
        $commande = Commande::find($id);

        $dateCommande = date('Y-m-d', strtotime($request->dateCommande));

        $commande -> update([
            'dateCommande' => $dateCommande,
            'etat' => $request->etat,
            'client_id' => $request->client_id,
        ]);

        $commande->produits()->detach();
        foreach ($request->produits as $produit) {
            if (is_array($produit) && isset($produit['id']) && !is_null($produit['quantite'])) {
                $commande->produits()->attach($produit['id'], ['quantite' => $produit['quantite']]);
            }
        } 

        return redirect()->route ('commandes.index');       

    }

    public function destroy ($id){
        $commande = Commande::find($id);
        $commande->produits()->detach();
        $commande->delete();
        return redirect()->route ('commandes.index');
    }

    public function facture ($id){
        $commande = Commande::find($id);

        $total = 0;
        foreach ($commande->produits as $produit) {
            $total += $produit->pivot->quantite * $produit->prix;
        }

        $pdf = Pdf::loadView('commandes.facture', compact('commande', 'total'))
            ->setPaper('a4')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        return $pdf->stream("facture_commande_{$commande->id}.pdf");

    }
    
}
