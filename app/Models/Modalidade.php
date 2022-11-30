<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modalidades';

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

    /**
     * Get the Quadras that belong to the modalidades.
     *
     * @return Quadra
     */
    public function quadraRelationship() {
        return $this->hasMany(Quadra::class,'modalidade_id');
    }
}
