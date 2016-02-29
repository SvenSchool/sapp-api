<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The fields that may be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Scope if the group is active.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
