<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seances extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_enseignant',
        'id_classe',
        'date',
        'heure_debut',
        'heure_fin',
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignants::class, 'id_enseignant');
    }

    public function classe()
    {
        return $this->belongsTo(Classes::class, 'id_classe');
    }
}
