<?php

namespace App\Models;

use App\Models\Niveau;
use App\Models\Option;
use App\Models\Seances;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'option_id',
        'niveau_id',
    ];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function niveau(): BelongsTo
    {
        return $this->belongsTo(Niveau::class);
    }

    public static function generateClassName($optionName, $niveauName)
    {
        return $optionName . "-" . $niveauName;
    }

    public function seances(): HasMany
    {
        return $this->hasMany(Seances::class);
    }
}
