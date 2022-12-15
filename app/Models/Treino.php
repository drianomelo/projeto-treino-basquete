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

    public function getModalidadeAttribute()
    {
        return $this->modalidadeRelationship;
    }

    public function setModalidadeAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['modalidade_id'] = Modalidade::where('id', $value)->first()->id;
        }
    }

    public function modalidadeRelationship()
    {
        return $this->belongsTo(Modalidade::class, 'modalidade_id');
    }
}
