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

    public static function boot()
    {
        parent::boot();

        static::deleting(function($type) {
            // Supprimer toutes les attaques associées à ce type
            $type->attacks()->each(function ($attack) {
                $attack->delete();
            });
        });
    }

    public function getColorClassAttribute()
    {
        return strtolower($this->color);
    }
}
