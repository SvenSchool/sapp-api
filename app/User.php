<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Model
{
    use HasRolesAndAbilities;

    protected $fillable = ['email', 'password'];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->attributes['first_name'] .
               $this->attributes['insertion'] .
               $this->attributes['last_name'];
    }
}
