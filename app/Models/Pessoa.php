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

    public function getAtributoAttribute() {
        return $this->atributoRelationship;
    }

    public function getTreinoAttribute() {
        return $this->treinoRelationship;
    }

    /**
     * Get the Atributos that belong to the pessoa.
     *
     * @return Atributo
     */
    public function atributoRelationship() {
        return $this->belongsTo(Atributo::class,'atributo_id');//Relacionamento 1 para 1
    }

    public function treinoRelationship() {
        return $this->belongsToMany(Treino::class,'pessoas_has_treinos','pessoa_id','treino_id');//Relacionamento muitos para muitos;
    }
}
