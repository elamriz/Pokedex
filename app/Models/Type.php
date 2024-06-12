<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color', 'image'];

    public function pokemon()
    {
        return $this->hasMany(Pokemon::class);
    }

    public function attacks()
    {
        return $this->hasMany(Attack::class);
    }

    public function getColorClassAttribute()
    {
        return 'text-' . strtolower($this->name);
    }
}
