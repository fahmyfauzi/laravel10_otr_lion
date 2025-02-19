<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LionAirAirCraftType extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'air_craft_type',
        'otr_application_id',
    ];

    public function otr_application()
    {
        return $this->belongsTo(OtrApplication::class);
    }
}
