<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClienteCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => [
                $this->collection->map(function ($collection) {
                    return [
                        'id' => $collection->id,
                        'nome' => $collection->nome,
                        'email' => $collection->email,
                        'telefone' => $collection->telefone,
                        'estado' => $collection->estado,
                        'cidade' => $collection->cidade,
                        'data_de_nascimento' => $collection->data_de_nascimento->format('Y-m-d'),
                        'canDelete' => !$collection->cannotDelete,
                        'planos' => $collection->planos,
                    ];
                })
            ],
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

}
