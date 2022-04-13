<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'montant',
        'code',
        'adresse',
        'pays',
        'staut',
        'user_id',
    ];
}
