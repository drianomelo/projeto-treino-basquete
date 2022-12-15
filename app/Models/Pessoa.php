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
        'atributoRelationship',
        'treinoRelationship',
        'posicaoRelationship',
        'created_at',
        'updated_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'atributo',
        'treino',
    ];

    //MÉTODOS GETTER

    public function getAtributoAttribute()
    {
        return $this->atributoRelationship;
    }

    public function getTreinoAttribute()
    {
        return $this->treinoRelationship;
    }

    //MÉTODOS SETTER

    /**
     * Set the atributo's id.
     *
     * @param  int $value
     * @return void
     */
    public function setATributoAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['atributo_id'] = Atributo::where('id', $value)->first()->id;
        }
    }

    /**
     * Set the treino attribute.
     *
     * @param  array $value
     * @return void
     */

    public function setTreinoAttribute($value)
    {
        $this->treinoRelationship()->sync($value);
    }

    //RELACIONAMENTOS

    /**
     * Get the Atributos that belong to the pessoa.
     *
     * @return Atributo
     */
    public function atributoRelationship()
    {
        return $this->belongsTo(Atributo::class, 'atributo_id'); //Relacionamento 1 para 1
    }

    public function treinoRelationship()
    {
        return $this->belongsToMany(Treino::class, 'pessoas_has_treinos', 'pessoa_id', 'treino_id'); //Relacionamento muitos para muitos;
    }
}
