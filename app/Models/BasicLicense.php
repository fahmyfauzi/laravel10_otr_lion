<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicLicense extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'card_no',
        'category',
        'otr_application_id',
    ];

    public function otr_application()
    {
        return $this->belongsTo(OtrApplication::class);
    }
}
