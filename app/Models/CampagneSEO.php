<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampagneSEO extends Model
{
    use HasFactory;

    protected $fillable = ['campagne_id', 'backlinks', 'score_concurrence'];

    // Relation avec Campagne
    public function campagne()
    {
        return $this->belongsTo(Campagne::class);
    }
}
