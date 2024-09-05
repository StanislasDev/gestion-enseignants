<?php

namespace App\Models;

use App\Models\Niveau;
use App\Models\Seances;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_classe',
        'niveau_id',
    ];

    public function niveau(): BelongsTo
    {
        return $this->belongsTo(Niveau::class);
    }

    public function seances(): HasMany
    {
        return $this->hasMany(Seances::class);
    }
}
