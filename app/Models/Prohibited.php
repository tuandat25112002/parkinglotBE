<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prohibited extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primarykey = 'id';
    protected $fillable = [
        'Route','start_longitude','start_Latitude','end_longitude','end_Latitude'

    ];
    protected $table = 'prohibiteds';
}
