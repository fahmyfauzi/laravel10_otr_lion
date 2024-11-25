<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtrApplication extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'personnel_id',
        'user_id',
        'authorize_laca_id',
        'mandatory_training_id',
        'ame_license_id',
        'asessment_id',
        'pic_coodinator_id',
        'pic_status',
        'submited_at',
        'pic_check_at'

    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

    public function authorizeLaca()
    {
        return $this->belongsTo(AuthorizeLaca::class);
    }

    public function mandatoryTraining()
    {
        return $this->belongsTo(MandatoryTraining::class);
    }

    public function ameLicense()
    {
        return $this->belongsTo(AmeLicense::class);
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function picCoordinator()
    {
        return $this->belongsTo(User::class, 'pic_coodinator_id');
    }

    public function basicLicenses()
    {
        return $this->hasMany(BasicLicense::class);
    }

    public function lionAirAirCraftTypes()
    {
        return $this->hasMany(LionAirAirCraftType::class);
    }

    public function ratingTrainings()
    {
        return $this->hasMany(RatingTraining::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
