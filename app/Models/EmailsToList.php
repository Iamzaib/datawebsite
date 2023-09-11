<?php


namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailsToList extends Model
{
    use HasFactory;

    public $table = 'emails_to_lists';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'list_id',
        'email_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function list()
    {
        return $this->belongsTo(Lists::class, 'list_id');
    }
    public function email()
    {
        return $this->belongsTo(Email::class, 'email_id');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
