<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprises'; // Nom exact de la table
    protected $fillable = [
        'nom', 'dirigeant', 'image', 'description', 'pays', 'ville',
        'adresse', 'code_postal', 'email', 'site_web', 'num_TVA',
        'naf', 'domaine', 'lien_facebook', 'lien_linkedin',
        'chiffre_affaires', 'telephone', 'effectif', 'siret',
        'user_id', 'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
