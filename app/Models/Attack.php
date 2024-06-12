<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attack extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'damage', 'description', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class, 'attack_pokemon');
    }
}
