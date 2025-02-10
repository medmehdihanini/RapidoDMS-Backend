<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable = [
        'type',
        'donnees',
        'date_creation',
    ];

    protected $casts = [
        'donnees' => 'array',  //Data json
        'date_creation' => 'datetime',
    ];
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
    const TYPE_SEO = 'SEO';
    const TYPE_ADS = 'Ads';
    const TYPE_LOCAL = 'Local';
}
