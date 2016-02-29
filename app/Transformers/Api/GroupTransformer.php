<?php

namespace App\Transformers\Api;

use Illuminate\Database\Eloquent\Collection;

class GroupTransformer extends Transformer
{
    /**
     * Transform one group.
     *
     * @param  array $group
     * @return array
     */
    public function transform($group)
    {
        return [
            'id' => $group['id'],
            'name' => $group['name'],
        ];
    }
}