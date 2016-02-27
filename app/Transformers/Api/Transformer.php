<?php

namespace App\Transformers\Api;

abstract class Transformer
{
    /**
     * Transform a collection of data from the database.
     *
     * @param  array $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * Transform one item into the right format.
     *
     * @param  array $item
     * @return array
     */
    public abstract function transform($item);
}