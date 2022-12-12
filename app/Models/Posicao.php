<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posicao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posicaos';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [

    ];
}
