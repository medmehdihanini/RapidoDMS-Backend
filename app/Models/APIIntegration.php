<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APIIntegration extends Model
{
    protected $table = 'api_integrations';

    protected $fillable = [
        'type',
        'api_key',
        'config',
    ];

    protected $casts = [
        'config' => 'array',  // Transformer le champ JSON en tableau
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function validerJSON($data)
    {

        return is_array($data) && !empty($data);
    }
}
