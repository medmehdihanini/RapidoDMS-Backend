<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        'nom', 'siret', 'adresse', 'code_postal', 'ville',
        'charte_graphique', 'email', 'telephone', 'site_web',
        'banque', 'switch', 'iban', 'logo', 'password',
        'host', 'port', 'encryption', 'validate_cert',
        'stripe_secret', 'sms_id'
    ];

    public function entreprises()
    {
        return $this->hasMany(Entreprise::class, 'company_id');
    }
}

