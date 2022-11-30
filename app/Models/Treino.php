<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'treinos';

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
     * The Pessoas that belong to the treino.
     *
     * @return Pessoa
     */
    public function pessoaRelationship() {
        return $this->belongsToMany(Pessoa::class,'treinos_has_pessoas','treino_id','pessoa_id');
    }

    /**
     * Get the Quadras that belong to the treino.
     *
     * @return Quadra
     */
    public function quadraRelationship() {
        return $this->hasMany(Quadra::class,'treino_id');
    }
}
