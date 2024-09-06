<?php

namespace App\Models;

use App\Models\Seances;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jour extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function seances()
    {
        return $this->hasMany(Seances::class);
    }
}
