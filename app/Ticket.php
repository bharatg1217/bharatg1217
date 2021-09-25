<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model 
{
    public $table = 'tickets';

    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'ticke_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
       
}
