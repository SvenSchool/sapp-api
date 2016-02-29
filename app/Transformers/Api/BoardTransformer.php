<?php

namespace App\Transformers\Api;

use Illuminate\Database\Eloquent\Collection;

class BoardTransformer extends Transformer
{
    /**
     * Transform one board.
     *
     * @param  array $board
     * @return array
     */
    public function transform($board)
    {
        return [
            'name' => $student['name'],
            'email' => $student['email'],
        ];
    }
}