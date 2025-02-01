<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //
    protected $fillable = ["dateCommande", "etat", "client_id"];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'ligne_commande')->withPivot('quantite');
    }

}
