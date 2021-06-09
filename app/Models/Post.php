<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Mutators
    public function setNameAttribute($value)
    {
        //TODO attributes modelo
        $this->attributes['name'] = strtolower($value);
    }

    //Accesors
    public function getSlugAttribute()
    {
        return str_replace(' ','-', $this->name);
    }

    //Metodo propio, no lo provee laravel
    public function href()
    {
        return "blog/{$this->slug}";
    }
}
