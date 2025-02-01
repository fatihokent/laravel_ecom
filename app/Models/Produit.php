<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $fillable = ["nom", "prix", "qteStock"];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'ligne_commande')->withPivot('quantite');
    }
}
