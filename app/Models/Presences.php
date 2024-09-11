<?php

namespace App\Models;

use App\Models\Seances;
use App\Models\Enseignants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presences extends Model
{
    use HasFactory;

    protected $fillable = [
        'enseignant_id',
        'seance_id',
        'date',
        'heure_arrivee',
        'heure_depart',
        'statut',
    ];

    // Relation avec l'enseignant
    public function enseignant()
    {
        return $this->belongsTo(Enseignants::class, 'id_enseignant');
    }

    // Relation avec la séance
    public function seance()
    {
        return $this->belongsTo(Seances::class, 'id_seance');
    }
}
