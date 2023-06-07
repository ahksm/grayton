<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffTranslation extends Model
{
    use HasFactory;

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }
}
