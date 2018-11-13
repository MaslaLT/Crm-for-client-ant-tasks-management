<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Tasks', 'project_id', 'id');
    }

    public function client()
    {
        return $this->hasOne('App\User', 'id', 'project_owner_id');
    }

}
