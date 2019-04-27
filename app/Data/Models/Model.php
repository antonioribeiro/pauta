<?php

namespace App\Data\Models;

use App\Data\Traits\Eventable;
use OwenIt\Auditing\Auditable;
use App\Data\Traits\Joinable;
use App\Data\Traits\Orderable;
use App\Data\Traits\Selectable;
use App\Data\Traits\Filterable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

abstract class Model extends Eloquent implements AuditableContract
{
    use Auditable, Selectable, Joinable, Orderable, Filterable, Eventable;

    protected $dates = ['created_at', 'updated_at'];

    /**
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = [])
    {
        $saved = parent::save();

        $this->fireEvents(
            $this,
            $this->wasRecentlyCreated ? 'Created' : 'Updated'
        );

        return $saved;
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->updated_by_id = ($user = auth()->user()) ? $user->id : 1;
        });

        static::creating(function ($model) {
            $model->created_by_id = ($user = auth()->user()) ? $user->id : 1;
        });

        static::deleted(function ($model) {
            $model->fireEvents($model, 'Deleted');
        });
    }

    public static function disableGlobalScopes()
    {
    }

    public static function enableGlobalScopes()
    {
    }
}

###Tipos de discussao
- 1a Discussão
- 2a Discussão
- Discussão Única

###Estados da proposição
- Será Discutida
- Disponível para receber Emendas
- Será votada

###Tipos de Objetos para apreciação
- Emendas
- Destaques
- Proposição

###Regimes de tramitação
- Ordinária
- Urgência
- Especial

###Tipos de resultado
- Sanção
- Veto Total
- Veto Parcial

###Tipo de projeto de lei
- Resolução
- Lei Complementar
- Lei Ordinária
- Decreto Legislativo
- Emenda Constitucional
- Indicação Legislativa

###Tipos de pareceres
- Favorável
- Favorável com emendas
- Favorável com substitutivo
- Pela constitucionalidade
- Pela Constitucionalidade com emendas
- Contrário
- Contrário ao substitutivo
- Pela Inconstitucionalidade
