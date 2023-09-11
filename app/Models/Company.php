<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const COMPANY_TYPE_SELECT = [
        'private'       => 'Private',
        'public'        => 'Public',
        'education'     => 'Education',
        'non-profit'    => 'Non-profit',
        'government'    => 'Government',
        'self employed' => 'Self Employed',
    ];

    public $table = 'companies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company_name',
        'company_details',
        'company_type',
        'founded',
        'employees',
        'revenue',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function companyNameEmails()
    {
        return $this->hasMany(Email::class, 'company_name_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
