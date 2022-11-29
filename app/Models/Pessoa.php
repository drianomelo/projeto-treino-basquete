<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pessoas';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [

    ];
}
