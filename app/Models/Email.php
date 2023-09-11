<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const RECORD_TYPE_SELECT = [
        'realestate' => 'Real Estate Agents',
        'healthcare' => 'Healthcare Professionals',
        'business'   => 'Business Contacts',
    ];

    public $table = 'emails';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'record_type',
        'email_contact',
        'phone',
        'contact_name',
        'company_name_id',
        'job_level_id',
        'industries',
        'country_id',
        'state_id',
        'city_id',
        'county',
        'zip_code',
        'area_code',
        'website',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function company_name()
    {
        return $this->belongsTo(Company::class, 'company_name_id');
    }

    public function job_level()
    {
        return $this->belongsTo(JobPosition::class, 'job_level_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
