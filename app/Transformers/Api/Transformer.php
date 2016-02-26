<?php

namespace App\Transformers\Api;

abstract class Transformer
{
    /**
     * Transform a collection of lessons.
     *
     * @param  array $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}