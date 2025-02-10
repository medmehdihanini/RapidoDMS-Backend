<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model
{
    use HasFactory;

    protected $fillable = ['entreprise_id', 'type'];

    // Relation avec Entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    // Relation avec CampagneSEO
    public function campagneSEO()
    {
        return $this->hasOne(CampagneSEO::class);
    }

    // Relation avec CampagneMarketing
    public function campagneMarketing()
    {
        return $this->hasOne(CampagneMarketing::class);
    }
}
