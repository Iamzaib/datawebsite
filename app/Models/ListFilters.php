<?php


namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListFilters extends Model
{
    use HasFactory;

    public $table = 'lists_filters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'list_id',
        'filter_title',
        'filter_value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function list()
    {
        return $this->belongsTo(Lists::class, 'list_id');
    }
}
