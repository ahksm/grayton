<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasFactory;

    public function tariffs()
    {
        return $this->hasMany(Tariff::class);
    }

    public function translations()
    {
        return $this->hasMany(LocationTranslation::class);
    }
}
