<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'parking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'description',
        'lat',
        'long',
        'slot',
        'max',
        'image',
        'search_number',
    ];

    protected $primaryKey = 'id';
}
