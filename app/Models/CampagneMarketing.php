<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampagneMarketing extends Model
{
    use HasFactory;

    protected $fillable = ['campagne_id', 'annonces', 'roi'];

    // Relation avec Campagne
    public function campagne()
    {
        return $this->belongsTo(Campagne::class);
    }
}
