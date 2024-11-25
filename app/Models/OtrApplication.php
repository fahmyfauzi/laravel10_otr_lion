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
        'ame_license_id',
        'asessment_id',
        'pic_coordinator_id',
        'pic_status',
        'submited_at',
        'pic_check_at'

    ];

    public function scopeWithAllRelations($query)
    {
        return $query->with([
            'personnel',
            'ratingTrainings',
            'basicLicenses',
            'ameLicense',
            'lionAirAirCraftTypes',
            'assessment',
            'assessment.qualityInspector',
            'assessment.authorizeLaca',
            'assessment.mandatoryTraining'
        ]);
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
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
        return $this->belongsTo(User::class, 'pic_coordinator_id');
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
