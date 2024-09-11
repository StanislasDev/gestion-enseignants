<?php

namespace App\Models;

use App\Models\Presences;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enseignants extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
    ];

    public function seances()
    {
        return $this->hasMany(Seances::class, 'id_enseignant');
    }

    public function presences()
    {
        return $this->hasMany(Presences::class, 'id_enseignant');
    }
}
