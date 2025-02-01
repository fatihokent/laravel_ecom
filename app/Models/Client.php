<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = ["nom", "prenom", "tel", "email"];

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

}
