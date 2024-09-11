<?php

namespace App\Models;

use App\Models\Jour;
use App\Models\Presences;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seances extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_enseignant',
        'id_classe',
        'id_jour',
        'date',
        'heure_debut',
        'heure_fin',
    ];

    
    public function classe()
    {
        return $this->belongsTo(Classes::class, 'id_classe');
    }

    public function niveau()
    {
        return $this->belongsToThrough(Niveau::class, Classes::class, 'id_niveau', 'id_classe');
    }
    
    public function jour()
    {
        return $this->belongsTo(Jour::class, 'id_jour');
    }
    public function enseignant()
    {
        return $this->belongsTo(Enseignants::class, 'id_enseignant');
    }


    public function presences()
    {
        return $this->hasMany(Presences::class, 'id_seance');
    }

}
