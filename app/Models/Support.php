<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $table = 'supports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iduser',
        'phone',
        'lat',
        'long',
        'address',
        'description',
        'status'   //1:confirming,2:waiting,3:complete,0:cancle
    ];

    protected $primaryKey = 'id';

    public function User() {
        return $this->belongsTo('App\Models\User','iduser','id');
    }
}
