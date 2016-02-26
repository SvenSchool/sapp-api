<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'insertion',
        'type_id',
    ];

    /**
     * Build up the full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name
             . $this->insertion
             . $this->last_name;
    }

    /**
     * Prepend the insertion with a space.
     *
     * @return string
     */
    public function getInsertionAttribute()
    {
        return ' ' . $this->attributes['insertion'];
    }

    /**
     * Prepend the last name with a space.
     *
     * @return string
     */
    public function getLastNameAttribute()
    {
        return ' ' . $this->attributes['last_name'];
    }

    /**
     * Scope to get all the students.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeStudents($query)
    {
        return $query->where('type_id', 1);
    }

    /**
     * Scope to get all the teachers.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeTeachers($query)
    {
        return $query->where('type_id', 2);
    }

    /**
     * Scope to get all the admins.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeAdmins($query)
    {
        return $query->where('type_id', 3);
    }
}
